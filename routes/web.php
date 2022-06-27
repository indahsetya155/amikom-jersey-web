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

Route::get('/',function (){
    return view('frontend.welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

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
