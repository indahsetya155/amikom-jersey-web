<?php

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register'=>true,
    'reset'=>false,
]);

Route::get('/','FrontendController@index')->name('fornt');
Route::get('item/{id}', 'FrontendController@detail')->name('detail');
Route::middleware('auth')->group(function () {
    Route::get('keranjang','FrontendController@listCart')->name('list-cart');
    Route::get('form-checkout', 'FrontendController@formCheckout')->name('form-checkout');
    Route::get('checkout', 'FrontendController@listCheckout')->name('list-checkout');
    Route::post('checkout', 'FrontendController@checkout')->name('checkout');
    Route::get('wishlist','FrontendController@listWishlist')->name('list-wishlist');
    Route::get('addwishlist/{id}','FrontendController@addwishlist')->name('add-wishlist');
    Route::get('hapus-wishlist', 'FrontendController@deleteWishlist')->name('delete-wishlist');
    Route::post('addkeranjang', 'FrontendController@addKeranjang')->name('add-keranjang');
    Route::get('change-jumlah', 'FrontendController@changeKeranjang')->name('change-keranjang');
    Route::get('hapus-keranjang', 'FrontendController@deleteKeranjang')->name('hapus-keranjang');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('produk', ProductController::class);
    Route::get('/product/data', 'ProductController@fetch_data')->name('product.data');
    Route::get('/gallery/{id}/data', 'ProductController@fetch_data_gallery')->name('gallery.data');

    Route::resource('produk-galeri', ProductGalleryController::class);
    Route::get('/product-galeri/data', 'ProductGalleryController@fetch_data')->name('product-galeri.data');

    Route::resource('transaksi', TransactionController::class);
    Route::get('/transaction/data', 'TransactionController@fetch_data')->name('transaksi.data');


    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('table/{bulan}', 'HomeController@fetch_data');
        Route::get('data', 'HomeController@getDataStatistik');
        Route::get('grafik', 'HomeController@getGrafik');
    });
});

