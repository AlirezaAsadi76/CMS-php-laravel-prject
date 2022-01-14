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

Auth::routes();
Route::get('/','WebsiteController@index')->name('web.index');
Route::get('category/{slug}','WebsiteController@category')->name('web.category');
Route::get('post/{slug}','WebsiteController@post')->name('web.post');
Route::get('page/{slug}','WebsiteController@page')->name('web.page');
Route::get('contact','WebsiteController@showcontactform')->name('web.contact.show');
Route::post('contact','WebsiteController@submitContact')->name('web.contact.submit');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('posts',PostController::class);
    Route::resource('pages',PageController::class);
    Route::resource('galleries',GalleryController::class);

});
