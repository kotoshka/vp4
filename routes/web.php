<?php

use App\Http\Middleware\AdminOnly;
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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/news', 'PostController@index')->name('news.index');
Route::get('/news/create', 'PostController@create')->name('news.create')->middleware('auth', 'adminOnly');
Route::Post('/news/store', 'PostController@store')->name('news.store')->middleware('auth', 'adminOnly');
Route::Get('/news/detail', 'PostController@detail')->name('news.detail');
Route::Get('/news/delete', 'PostController@delete')->name('news.delete')->middleware('auth', 'adminOnly');
Route::Get('/news/edit', 'PostController@edit')->name('news.edit')->middleware('auth', 'adminOnly');
Route::Post('/news/update', 'PostController@update')->name('news.update')->middleware('auth', 'adminOnly');
Route::Get('/news/admin', 'PostController@admin')->name('news.admin')->middleware('auth', 'adminOnly');

Route::Get('/category', 'CategoryController@index')->name('category.index');
Route::Get('/category/create', 'CategoryController@create')->name('category.create')->middleware('auth', 'adminOnly');
Route::Post('/category/store', 'CategoryController@store')->name('category.store')->middleware('auth', 'adminOnly');
Route::Get('/category/detail', 'CategoryController@detail')->name('category.detail');
Route::Get('/category/delete', 'CategoryController@delete')->name('category.delete')->middleware('auth', 'adminOnly');
Route::Get('/category/edit', 'CategoryController@edit')->name('category.edit')->middleware('auth', 'adminOnly');
Route::Post('/category/update', 'CategoryController@update')->name('category.update')->middleware('auth', 'adminOnly');
Route::Get('/category/admin', 'CategoryController@admin')->name('category.admin')->middleware('auth', 'adminOnly');

Route::Get('/product', 'ProductController@index')->name('product.index');
Route::Get('/product/create', 'ProductController@create')->name('product.create')->middleware('auth', 'adminOnly');
Route::Post('/product/store', 'ProductController@store')->name('product.store')->middleware('auth', 'adminOnly');
Route::Get('/product/delete', 'ProductController@delete')->name('product.delete')->middleware('auth', 'adminOnly');
Route::Get('/product/edit', 'ProductController@edit')->name('product.edit')->middleware('auth', 'adminOnly');
Route::Post('/product/update', 'ProductController@update')->name('product.update')->middleware('auth', 'adminOnly');
Route::Get('/product/admin', 'ProductController@admin')->name('product.admin')->middleware('auth', 'adminOnly');

Route::Get('/product/search', 'ProductController@search')->name('product.search');

Route::Get('/cart', 'CartController@index')->name('cart.index');
Route::Post('/cart/ordermake', 'CartController@ordermake')->name('cart.ordermake');
Route::Get('/cart/order', 'CartController@order')->name('cart.order');

Route::Get('/order', 'OrderController@index')->name('order.index')->middleware('auth');
Route::Get('/order/admin', 'OrderController@admin')->name('order.admin')->middleware('auth', 'adminOnly');
Route::Post('/order/email', 'OrderController@email')->name('order.email')->middleware('auth', 'adminOnly');