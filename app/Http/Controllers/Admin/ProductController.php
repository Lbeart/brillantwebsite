<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::query()->orderByDesc('id');

        if ($s = $request->get('search')) {
            $q->where('name', 'like', "%{$s}%");
        }

        $products = $q->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'category'    => 'required|string|max:50',
            'subcategory' => 'nullable|string|in:anesore,ditore',
            'price'       => 'nullable|numeric|min:0',
            'stock'       => 'nullable|integer|min:0',
            'sizes'       => 'nullable|array',
            'description' => 'nullable|string',
            'is_active'   => 'sometimes|boolean',
            'image'       => 'nullable|image|max:10240',
            'sku'         => 'nullable|alpha_dash|unique:products,sku',
        ]);

        // Vetëm perde ka subcategory; për të tjerat e heqim
        if (($data['category'] ?? null) !== 'perde') {
            $data['subcategory'] = null;
        }

        // Normalizo is_active (checkbox)
        $data['is_active'] = $request->boolean('is_active');

        // Gjenero slug gjithmonë në krijim
        $data['slug'] = Str::slug($data['name']).'-'.Str::random(6);

        // Nëse sku mungon, gjeneroje
        if (empty($data['sku'])) {
            $data['sku'] = Str::upper(Str::slug($data['name'])).'-'.Str::random(4);
        }

        // Ruaj imazhin nëse ka
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        // Normalizo sizes
        $norm = $this->normalizeSizes($request->input('sizes', []));
        $data['sizes'] = !empty($norm) ? json_encode($norm) : null;

        // Derivo price/stock nga sizes nëse ka
        if (!empty($norm)) {
            $minPrice = collect($norm)->pluck('price')->filter(fn($p) => $p !== null)->min();
            $sumStock = collect($norm)->pluck('stock')->sum();
            $data['price'] = $minPrice ?? ($data['price'] ?? 0);
            $data['stock'] = $sumStock ?? ($data['stock'] ?? 0);
        }

        // KRIJO vetëm një herë (jo dy insert-e)
        Product::create($data);

        return redirect()->route('admin.products.index')->with('ok', 'Produkti u shtua.');
    }

    public function edit(Product $product)
    {
        $product->sizes = $product->sizes ? json_decode($product->sizes, true) : [];
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'category'    => 'required|string|max:50',
            'subcategory' => 'nullable|string|in:anesore,ditore',
            'price'       => 'nullable|numeric|min:0',
            'stock'       => 'nullable|integer|min:0',
            'sizes'       => 'nullable|array',
            'description' => 'nullable|string',
            'is_active'   => 'sometimes|boolean',
            'image'       => 'nullable|image|max:10240',
            'sku'         => 'nullable|alpha_dash|unique:products,sku,'.$product->id,
        ]);

        if (($data['category'] ?? null) !== 'perde') {
            $data['subcategory'] = null;
        }

        // Normalizo is_active
        $data['is_active'] = $request->boolean('is_active');

        // Nëse ndryshon emri → ri-gjenero slug
        if ($product->name !== $data['name']) {
            $data['slug'] = Str::slug($data['name']).'-'.Str::random(6);
        }

        // Imazhi (fshi të vjetrin nëse ekziston)
        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        // Normalizo sizes
        $norm = $this->normalizeSizes($request->input('sizes', []));
        $data['sizes'] = !empty($norm) ? json_encode($norm) : null;

        // Derivo price/stock nga sizes nëse ka
        if (!empty($norm)) {
            $minPrice = collect($norm)->pluck('price')->filter(fn($p) => $p !== null)->min();
            $sumStock = collect($norm)->pluck('stock')->sum();
            $data['price'] = $minPrice ?? ($data['price'] ?? $product->price);
            $data['stock'] = $sumStock ?? ($data['stock'] ?? $product->stock);
        }

        // Update i vetëm (pa save() para update())
        $product->update($data);

        return redirect()->route('admin.products.index')->with('ok', 'Produkti u përditësua.');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return back()->with('ok', 'Produkti u fshi.');
    }

    private function normalizeSizes(array $sizes): array
    {
        $out = [];
        if (isset($sizes['label']) && is_array($sizes['label'])) {
            foreach ($sizes['label'] as $i => $lbl) {
                $lbl = trim((string)$lbl);
                if ($lbl === '') continue;

                $price = isset($sizes['price'][$i]) && $sizes['price'][$i] !== '' ? (float)$sizes['price'][$i] : null;
                $stock = isset($sizes['stock'][$i]) && $sizes['stock'][$i] !== '' ? (int)$sizes['stock'][$i] : 0;

                $out[] = ['label' => $lbl, 'price' => $price, 'stock' => $stock];
            }
        }
        return $out;
    }
}
