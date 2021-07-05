<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('add-product','ProductController@create')->name('add.product');
Route::post('upload-product','ProductController@storeProduct')->name('upload.prouct');
Route::get('product-list','ProductController@productList')->name('product.list');
Route::get('product-details/{id}','ProductController@productdetails')->name('product.details');
Route::get('addtocart','ProductController@addToCart');
Route::get('cart-details','ProductController@urCartDetails');


});