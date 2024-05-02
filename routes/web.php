<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => '\App\Http\Controllers\User'], function () {
    Route::get('/users', 'IndexController@index')->name('users.index');
    Route::get('user/{user}', 'ShowController@show')->name('user.show');
    Route::get('users/create', 'CreateController@create')->name('user.create'); // добавил к user окончание, т.к. иначе выдавало ошибку.
    Route::post('user/', 'StoreController@store')->name('user.store');
    Route::get('user/{user}/edit', 'EditController@edit')->name('user.edit');
    Route::get('user/{user}/password/edit', 'EditPasswordController@edit')->name('user.edit_password');
    Route::patch('user/{user}', 'UpdateController@update')->name('user.update');
    Route::patch('user/password/{user}', 'UpdatePasswordController@update')->name('user.update_password');
    Route::delete('user/{user}', 'DestroyController@destroy')->name('user.destroy');
});
Route::group(['namespace' => '\App\Http\Controllers\Product'], function () {
    Route::get('/', 'IndexController@index')->name('products.index');
    Route::get('/{product}', 'ShowController@show')->name('product.show');
    Route::get('product/create', 'CreateController@create')->name('product.create');
    Route::post('/', 'StoreController@store')->name('product.store');
    Route::get('/{product}/edit', 'EditController@edit')->name('product.edit');
    Route::patch('/{product}', 'UpdateController@update')->name('product.update');
    Route::delete('/{product}', 'DestroyController@destroy')->name('product.destroy');
});
Route::group(['namespace' => '\App\Http\Controllers\Category'], function () {
    Route::get('/categories/s', 'IndexController@index')->name('categories.index');
    Route::get('category/create', 'CreateController@create')->name('category.create');
    Route::post('category/', 'StoreController@store')->name('category.store');
    Route::get('category/{category}/edit', 'EditController@edit')->name('category.edit');
    Route::patch('category/{category}', 'UpdateController@update')->name('category.update');
    Route::delete('category/{category}', 'DestroyController@destroy')->name('category.destroy');
});
