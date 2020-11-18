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

Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/messages', 'App\Http\Controllers\MessagingController@store');


Route::group(['middleware' => 'auth.jwt'], function () {
    
    Route::get('logout','APIController@logout');
    Route::get('/messages', 'App\Http\Controllers\MessagingController@index');
    Route::post('/gallery', 'App\Http\Controllers\GalleryController@store');
    Route::get('/gallery', 'App\Http\Controllers\GalleryController@index');
    Route::get('/gallery/{gal}', 'App\Http\Controllers\GalleryController@show');
    Route::put('/gallery/{gal}', 'App\Http\Controllers\GalleryController@update');
    Route::delete('/gallery/{gal}', 'App\Http\Controllers\GalleryController@delete');
    Route::get('/products', 'App\Http\Controllers\ProductsController@index');
    Route::get('/products/{id}', 'App\Http\Controllers\ProductsController@show');
    Route::post('/products', 'App\Http\Controllers\ProductsController@store');
    Route::put('/products/{id}', 'App\Http\Controllers\ProductsController@update');
    Route::delete('/products/{id}', 'App\Http\Controllers\ProductsController@delete');

});