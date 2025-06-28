<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [ItemController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('lang/{lang}', function ($lang) {
    session(['locale' => $lang]);
    app()->setLocale($lang);
    return redirect()->back();
})->name('lang.switch');

Route::get('/tepiha', function () {
    return view('products.tepiha');
});
Route::get('/anesore', function () {
    return view('products.anesore');
});
Route::get('/postava', function () {
    return view('products.postavaa');
});
Route::get('/mbulesa', function () {
    return view('products.mbulesa');
});
Route::get('/jastekdekorues', function () {
    return view('products.jastekdekorues');
});
Route::get('/batanije', function () {
    return view('products.batanije');
});
Route::get('/tepihebanjo', function () {
    return view('products.tepihebanjo');
});
Route::get('/posteqia', function () {
    return view('products.posteqia');
});
Route::get('/perdeditore', function () {
    return view('perdeditore');
});
Route::get('/perde-ditore', function () {
    return view('products.perdeditore');
});