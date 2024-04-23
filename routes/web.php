<?php

use App\Models\Cleaning;
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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/contact','PagesController@contact')->name('contact');
Route::post('/contact-send','PagesController@contactSend')->name('contact-send');
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/products','PagesController@products')->name('products');
Route::get('/sale','PagesController@sale')->name('sale');
Route::get('/product/{id}','PagesController@product')->name('product');
Route::get('/checkout','PagesController@checkout')->name('checkout');
Route::get('/booking','PagesController@booking')->name('booking');
Route::post('/booking','CleaningStoreController@store');
Route::post('/review-send','PagesController@reviewSend')->name('review-send');
Route::post('/cart-add','CartController@cartAdd')->name('cart-add');
Route::post('/make-order','CartController@makeOrder')->name('make-order');
Route::get('/coupon-check','CartController@couponCheck')->name('coupon-check');

Route::get('/cart-minus','CartController@cartMinus')->name('cart-minus');
Route::get('/cart-plus','CartController@cartPlus')->name('cart-plus');
Route::get('/order-success/{id}','CartController@orderSuccess')->name('order-success');
Route::get('/order-failed','CartController@orderFailed')->name('order-failed');
Route::get('/cleaning-success/{id}', 'CleaningStoreController@success')->name('cleaning-success');
Route::get('/cleaning-failed/{id}', 'CleaningStoreController@failder')->name('cleaning-failed');

//success
Route::get('/cart-remove','CartController@cartRemove')->name('cart-remove');

Route::get('/shipping-get','CartController@getShipping')->name('shipping-get');

//dropzone
Route::post('/admin/product/{id}/upload_images','Admin\ProductCrudController@ajaxUploadImages');
Route::post('/admin/product/{id}/reorder_images','Admin\ProductCrudController@ajaxReorderImages');
Route::post('/admin/product/{id}/delete_image','Admin\ProductCrudController@ajaxDeleteImage');
