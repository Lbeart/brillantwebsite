<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8">
  <title>{{ $product->name }} – Detaje</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <meta name="description" content="{{ Str::limit(strip_tags($product->description ?? $product->name), 160) }}">
  <meta property="og:title" content="{{ $product->name }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta property="og:description" content="{{ Str::limit(strip_tags($product->description ?? $product->name), 160) }}">
  @if($product->image_path)
    <meta property="og:image" content="{{ asset('storage/'.$product->image_path) }}">
  @endif

  <style>
    :root{
      --card-radius:14px; --shadow-sm:0 4px 14px rgba(0,0,0,.08);
      --shadow-lg:0 12px 30px rgba(0,0,0,.10); --brand:#dc3545;
    }

    html,body{max-width:100%;overflow-x:hidden}
    *,*::before,*::after{box-sizing:border-box}
    img{max-width:100%;height:auto;display:block}
    body{background:#f7f8fb;font-family:system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif;padding-top:92px}

    .navbar-custom{
      position:fixed;top:12px;left:50%;transform:translateX(-50%);
      width:min(1150px,94%);background:linear-gradient(135deg,#0f172a 0%,#1f2937 100%);
      border-radius:18px;box-shadow:var(--shadow-sm);z-index:1000;padding:.65rem .9rem
    }
    .navbar-brand img{height:44px}
    .navbar-custom .nav-link{color:#fff!important;font-weight:600;letter-spacing:.2px}
    .navbar-custom .nav-link:hover{color:#e5e7eb!important}
    .dropdown-menu{border:0;border-radius:14px;padding:.5rem;box-shadow:var(--shadow-lg);background:#fff}
    .dropdown-item{border-radius:8px}.dropdown-item:hover{background:#f3f4f6}

    .back-btn{
      position:fixed;top:90px;left:24px;z-index:1100;border:none;border-radius:999px;padding:.5rem .9rem;
      background:#fff;box-shadow:0 6px 20px rgba(0,0,0,.08);display:flex;align-items:center;gap:.4rem;color:#111827
    }
    .back-btn:hover{background:#f7f7f7}

    .product-hero{background:#fff;border-radius:16px;box-shadow:var(--shadow-sm);padding:12px;display:flex;align-items:center;justify-content:center;min-height:300px;position:relative}
    .product-hero img{width:100%;max-height:720px;object-fit:contain;border-radius:12px;user-select:none;-webkit-user-drag:none}
    .zoom-lens{position:absolute;display:none;width:180px;height:180px;border:1px solid rgba(0,0,0,.15);background:rgba(255,255,255,.18);backdrop-filter:blur(1px);border-radius:10px;pointer-events:none;box-shadow:0 6px 18px rgba(0,0,0,.08);cursor:crosshair}
    .zoom-pane{position:absolute;display:none;top:0;left:100%;margin-left:16px;width:380px;height:380px;border:1px solid #eee;border-radius:12px;background:#fff;box-shadow:var(--shadow-lg);background-repeat:no-repeat;overflow:hidden}
    @media (min-width:1400px){.zoom-pane{width:420px;height:420px}}

    h1,h2{color:#111827;font-weight:800}
    .price-now{color:var(--brand);font-weight:800;font-size:1.55rem}
    .stock.in{color:#198754;font-weight:600}.stock.out{color:#dc3545;font-weight:600}
    .qty-btn{width:40px;height:40px;border:1px solid #dee2e6;background:#fff;border-radius:.375rem}
    .qty-input{width:60px;height:40px;text-align:center;border:1px solid #dee2e6;border-radius:.375rem}
    .section-card{background:#fff;border-radius:16px;box-shadow:var(--shadow-sm);padding:18px}
    .contact-links a{text-decoration:none}

    .img-modal{position:fixed;inset:0;background:rgba(0,0,0,.88);display:none;z-index:2000;align-items:center;justify-content:center}
    .img-modal.open{display:flex}
    .img-modal img{max-width:100%;max-height:100%;object-fit:contain;touch-action:pan-x pan-y;position:relative;z-index:2000}
    .img-modal .close-btn{
      position:absolute;top:14px;right:14px;background:#fff;border:none;border-radius:999px;padding:.55rem .75rem;
      box-shadow:0 6px 18px rgba(0,0,0,.25);display:flex;align-items:center;justify-content:center;
      z-index:2100;
    }

    @media (max-width:991.98px){
      body{padding-top:86px}
      .navbar-custom{left:auto;right:auto;transform:none;inset:12px 8px auto 8px;width:auto;border-radius:12px;padding:.55rem .7rem}
      .navbar-brand img{height:38px}
      .container{padding-left:12px;padding-right:12px}
      .product-hero{padding:8px;min-height:auto}
      .product-hero img{max-height:420px;cursor:zoom-in}
      .zoom-pane,.zoom-lens{display:none!important}
      .back-btn{top:78px;left:8px;padding:.4rem .7rem;font-size:14px}
      .section-card{padding:14px}
      .contact-links{display:flex;flex-direction:column;gap:8px}
    }
    @media (max-width:576px){
      h1,h2,.h2{font-size:1.25rem}
      .price-now{font-size:1.2rem}
      .qty-btn,.qty-input{width:36px;height:36px;font-size:14px}
      .qty-input{width:50px}
      .btn{padding:.45rem .85rem;font-size:14px}
      .contact-links a{font-size:14px}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom" aria-label="Kryemeny">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/brillant.png') }}" alt="Brillant"></a>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>

        <li class="nav-item">
          @php
            $rawcat = strtolower($product->category ?? '');
            $cat = str_replace([' ', '_'], '-', $rawcat);
            $map = [
              'tepiha'         => 'products.tepiha',
              'mbulesa'        => 'products.mbulesa',
              'perde-ditore'   => 'products.perdeDitore',
              'perde-anesore'  => 'products.anesore',
              'jastekdekorues' => 'products.jastekdekorues',
              'postava'        => 'products.postava',
               'garnishte'        => 'products.garnishte',
                'tepihebanjo'        => 'products.tepihebanjo',
                 'batanije'        => 'products.batanije',
            ];
          @endphp
          @if(isset($map[$cat]))
            <a class="nav-link" href="{{ route($map[$cat]) }}">{{ ucwords(str_replace(['-', '_'], ' ', $cat)) }}</a>
          @else
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          @endif
        </li>

        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>

        @auth
          <li class="nav-item dropdown ms-lg-2">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
               href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
              <span class="user-name">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              @if(auth()->user()->role === 'admin')
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><hr class="dropdown-divider"></li>
              @endif
              <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item">Log out</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item ms-lg-2">
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Log in</a>
          </li>
        @endauth

        {{-- Shporta + Gjurmo --}}
        <li class="nav-item dropdown ms-lg-2">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
             href="#" id="cartDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false" onclick="return false;">
            <i class="bi bi-bag"></i> Shporta
            <span class="badge bg-danger rounded-pill ms-1 cart-badge">
              {{ session('cart_total_qty', 0) }}
            </span>
          </a>

          <div class="dropdown-menu dropdown-menu-end p-3 shadow" aria-labelledby="cartDropdown" style="min-width: 320px;">
            <div class="small text-muted mb-2">Gjurmo porosinë</div>
            <form class="d-flex align-items-stretch gap-2"
                  onsubmit="event.preventDefault();
                            const el=this.querySelector('#trackCodeNav');
                            const v=(el?.value||'').trim();
                            if(v){ window.location='{{ url('/track') }}/'+encodeURIComponent(v); }">
              <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input id="trackCodeNav" type="text" class="form-control"
                       placeholder="p.sh. BRL-LKNJ-0YXN" autocomplete="off" required>
                <button class="btn btn-danger" type="submit">Gjurmo</button>
              </div>
            </form>

            <div class="mt-3 d-grid">
              <a class="btn btn-outline-secondary btn-sm" href="{{ route('cart.index') }}">
                <i class="bi bi-bag"></i> Shiko shportën
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<button class="back-btn" type="button" onclick="history.back()"><i class="bi bi-arrow-left"></i> Kthehu prapa</button>

<div class="container mt-4">
  <div class="row g-4 align-items-start">
    <div class="col-lg-7">
      <div class="product-hero">
        @if($product->image_path)
          <img id="productImage" src="{{ asset('storage/'.$product->image_path) }}" data-zoom="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
        @else
          <img id="productImage" src="{{ asset('images/placeholder-product.png') }}" data-zoom="{{ asset('images/placeholder-product.png') }}" alt="{{ $product->name }}">
        @endif
        <div class="zoom-lens" id="zoomLens" aria-hidden="true"></div>
        <div class="zoom-pane" id="zoomPane" aria-hidden="true"></div>
      </div>
    </div>

    <div class="col-lg-5">
      <h1 class="h2 mb-2">{{ $product->name }}</h1>

      <div id="priceContainer" class="mb-2"><div class="price-now">{{ number_format($product->price, 2) }} €</div></div>

      <div id="stockContainer" class="mb-3">
        @php $inStock = ($product->stock ?? 0) > 0; @endphp
        <span class="stock {{ $inStock ? 'in' : 'out' }}">{{ $inStock ? 'Në stok: ' . (int)$product->stock : 'S’ka në stok' }}</span>
      </div>

      @php
        $sizes=[]; if(!empty($product->sizes)){ $decoded=json_decode($product->sizes,true); if(is_array($decoded)) $sizes=$decoded; }
      @endphp
      @if(count($sizes)>0)
        <div class="mb-3">
          <label for="sizeSelect" class="form-label">Zgjidh dimensionin:</label>
          <select id="sizeSelect" class="form-select">
            @foreach($sizes as $size)
              <option value="{{ (float)($size['price'] ?? $product->price) }}" data-stock="{{ (int)($size['stock'] ?? 0) }}">
                {{ $size['label'] }} - {{ number_format((float)($size['price'] ?? $product->price),2) }} € ({{ (int)($size['stock'] ?? 0) }} në stok)
              </option>
            @endforeach
          </select>
        </div>
      @endif

      <div class="d-flex align-items-center gap-3 mb-4">
        <div class="d-flex align-items-center gap-2">
          <button class="qty-btn" id="qtyMinus" type="button" aria-label="Zvogëlo">−</button>
          <input class="qty-input" id="qty" type="number" min="1" value="1" aria-label="Sasia">
          <button class="qty-btn" id="qtyPlus" type="button" aria-label="Rrit">+</button>
        </div>

        @php
          $waBase='https://wa.me/38344960661';
          $msg=rawurlencode("Përshëndetje! Dua ta porosis produktin:\n- {$product->name}\n- Dimensioni: \n- Çmimi: ".number_format($product->price,2)." €\n- Sasia: ");
        @endphp
        <a id="waBtn" class="btn btn-danger px-4" target="_blank" rel="noopener" href="{{ $waBase }}?text={{ $msg }}1">KONTAKTO</a>
      </div>

      <button id="addToCartBtn" class="btn btn-outline-danger px-4">
        <i class="bi bi-bag-plus"></i> Shto në shportë
      </button>

      <br><br>

      @if($product->description)
        <div class="section-card mb-4" id="desc">
          <h2 class="h5 mb-2">Përshkrimi</h2>
          <p class="mb-0">{{ $product->description }}</p>
        </div>
      @endif
    </div>
  </div>
</div>

<!-- Fullscreen modal -->
<div class="img-modal" id="imgModal" aria-hidden="true">
  <button class="close-btn" type="button" id="modalClose" aria-label="Mbyll"><i class="bi bi-x-lg"></i></button>
  <img id="modalImg" alt="Zoom">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
(() => {
  const sizeSelect=document.getElementById('sizeSelect');
  const priceContainer=document.getElementById('priceContainer');
  const stockContainer=document.getElementById('stockContainer');
  const waBtn=document.getElementById('waBtn');
  const qty=document.getElementById('qty');
  const minus=document.getElementById('qtyMinus');
  const plus=document.getElementById('qtyPlus');

  function selDim(){ if(!sizeSelect) return ''; return (sizeSelect.options[sizeSelect.selectedIndex].text.split(' - ')[0]||''); }
  function selPrice(){ if(!sizeSelect) return parseFloat({{ json_encode((float)$product->price) }}); return parseFloat(sizeSelect.value||{{ json_encode((float)$product->price) }}); }
  function selStock(){ if(!sizeSelect) return parseInt({{ json_encode((int)($product->stock ?? 0)) }},10); return parseInt(sizeSelect.options[sizeSelect.selectedIndex].dataset.stock||0,10); }
  function cleanQty(){ const v=parseInt(qty.value||1,10); qty.value=Math.max(1,isNaN(v)?1:v); }

  function updateUI(){
    const price=selPrice(); const stock=selStock();
    priceContainer.innerHTML=`<div class="price-now">${price.toFixed(2)} €</div>`;
    stockContainer.innerHTML=stock>0?`<span class="stock in">Në stok: ${stock}</span>`:`<span class="stock out">S’ka në stok</span>`;
    const baseMsg=`Përshëndetje! Dua ta porosis produktin:\n- {{ addslashes($product->name) }}\n- Dimensioni: ${selDim()||'—'}\n- Çmimi: ${price.toFixed(2)} €\n- Sasia: `;
    waBtn.href=`https://wa.me/38344960661?text=${encodeURIComponent(baseMsg)}${qty.value}`;
  }
  minus?.addEventListener('click',()=>{cleanQty(); qty.value=Math.max(1,parseInt(qty.value,10)-1); updateUI();});
  plus?.addEventListener('click',()=>{cleanQty(); qty.value=parseInt(qty.value,10)+1; updateUI();});
  qty?.addEventListener('input',()=>{cleanQty(); updateUI();});
  sizeSelect?.addEventListener('change',updateUI);
  updateUI();

  const img=document.getElementById('productImage');
  const lens=document.getElementById('zoomLens');
  const pane=document.getElementById('zoomPane');
  const isDesktop=()=>window.matchMedia('(min-width: 992px)').matches;

  if(img && lens && pane){
    let natW=0,natH=0,ratioX=1,ratioY=1; const zoomStrength=0.7;
    function setupZoom(){
      if(!isDesktop())return;
      const zoomUrl=img.getAttribute('data-zoom')||img.src;
      pane.style.backgroundImage=`url('${zoomUrl}')`;
      const tmp=new Image(); tmp.onload=function(){natW=tmp.naturalWidth;natH=tmp.naturalHeight; calc();}; tmp.src=zoomUrl;
    }
    function calc(){ if(!isDesktop())return; ratioX=natW/img.clientWidth; ratioY=natH/img.clientHeight; const s=(pane.clientWidth/lens.clientWidth)*zoomStrength; pane.style.backgroundSize=`${natW*s}px ${natH*s}px`; }
    function cur(e){ const r=img.getBoundingClientRect(); return {x:(e.clientX??0)-r.left,y:(e.clientY??0)-r.top}; }
    function move(e){
      if(!isDesktop())return; const p=cur(e);
      let L=p.x-lens.offsetWidth/2, T=p.y-lens.offsetHeight/2;
      L=Math.max(0,Math.min(L,img.clientWidth-lens.offsetWidth));
      T=Math.max(0,Math.min(T,img.clientHeight-lens.offsetHeight));
      lens.style.left=L+'px'; lens.style.top=T+'px';
      const s=(pane.clientWidth/lens.clientWidth)*zoomStrength; pane.style.backgroundPosition=`${-(L*ratioX)*s}px ${-(T*ratioY)*s}px`;
    }
    function show(){ if(isDesktop()){ lens.style.display='block'; pane.style.display='block'; calc(); } }
    function hide(){ lens.style.display='none'; pane.style.display='none'; }
    img.addEventListener('mouseenter',show); img.addEventListener('mouseleave',hide);
    img.addEventListener('mousemove',move); lens.addEventListener('mousemove',move);
    window.addEventListener('resize',()=>{ hide(); setupZoom(); });
    if(img.complete) setupZoom(); else img.addEventListener('load',setupZoom);
  }

  const modal=document.getElementById('imgModal');
  const modalImg=document.getElementById('modalImg');
  const modalClose=document.getElementById('modalClose');

  function openModal(){
    if(isDesktop())return;
    const zoomUrl=img?.getAttribute('data-zoom')||img?.src; if(!zoomUrl) return;
    modalImg.src=zoomUrl;
    modal.classList.add('open');
    document.body.style.overflow='hidden';
  }
  function closeModal(){
    modal.classList.remove('open');
    modalImg.src='';
    document.body.style.overflow='';
  }

  img?.addEventListener('click',openModal);
  modalClose?.addEventListener('click',closeModal);
  modal?.addEventListener('click',(e)=>{ if(e.target===modal) closeModal(); });
  window.addEventListener('keydown',(e)=>{ if(e.key==='Escape') closeModal(); });
})();

// ---- CART ----
const addBtn = document.getElementById('addToCartBtn');

function currentSizeLabel(){
  const s = document.getElementById('sizeSelect');
  return s ? (s.options[s.selectedIndex].text.split(' - ')[0] || '') : null;
}
function currentPrice(){
  const s = document.getElementById('sizeSelect');
  return s ? parseFloat(s.value) : parseFloat({{ json_encode((float)$product->price) }});
}

addBtn?.addEventListener('click', async () => {
  const payload = {
    product_id: {{ $product->id }},
    qty: parseInt(document.getElementById('qty').value || '1', 10),
    size: currentSizeLabel(),
    price: currentPrice()
  };

  try {
    const res = await fetch(`{{ route('cart.add') }}`, {
      method: 'POST',
      headers: {
        'Content-Type':'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify(payload)
    });
    const data = await res.json();
    if(data.ok){
      // përditëso të gjitha badge-t
      document.querySelectorAll('.cart-badge').forEach(b => b.textContent = data.totalQty);
      // njofto edhe globalisht (faqe tjera që dëgjojnë)
      document.dispatchEvent(new CustomEvent('cart:updated', { detail: { totalQty: data.totalQty }}));
      showToast(data.message || 'U shtua në shportë');
    } else {
      showToast(data.message || 'Diçka shkoi keq', true);
    }
  } catch (e) {
    showToast('Gabim lidhjeje', true);
  }
});

function showToast(text, isErr){
  let el = document.getElementById('cartToast');
  if(!el){
    el = document.createElement('div');
    el.id='cartToast';
    el.className='toast align-items-center text-bg-' + (isErr?'danger':'success');
    el.role='alert'; el.ariaLive='assertive'; el.ariaAtomic='true';
    el.style.position='fixed'; el.style.bottom='16px'; el.style.right='16px'; el.style.zIndex='3000';
    el.innerHTML=`<div class="d-flex"><div class="toast-body"></div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>`;
    document.body.appendChild(el);
  }
  el.querySelector('.toast-body').textContent = text;
  const t = new bootstrap.Toast(el, { delay: 1800 });
  t.show();
}
</script>
</body>
</html>
