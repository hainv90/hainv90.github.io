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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::namespace('frontend')-> group(function() {
	Route::prefix('cart')->group(function() {
		Route::get('', 'CartController@index')->name('cart.index');
		Route::get('store/{id}', 'CartController@store')->name('cart.store');
		Route::put('update', 'CartController@update')->name('cart.update');
		Route::get('delete/{id}', 'CartController@destroy')->name('cart.delete');
	});
	Route::get('/', 'HomeController@index');
	Route::get('{slug}/product', 'ProductController@show');
	Route::get('{slug}', 'CategoryController@index');
	Route::get('{slug}/post', 'PostController@show');

});
