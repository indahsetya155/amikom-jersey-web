<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cityid/{id}', function ($id){
    return listCityID($id);
});
Route::get('/harga/{kurir}/{id}/{berat}', function ($kurir,$id,$berat){
    return listsearchCostCityID($id,$kurir,$berat);
});
Route::get('product','API\ProductController@all');
Route::post('checkout','API\CheckoutController@checkout');
Route::get('transaction/{id}','API\TransactionController@get');
