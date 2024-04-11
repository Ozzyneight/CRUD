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
    Route::get('/', 'IndexController@index')->name('users.index');
    Route::get('/{user}', 'ShowController@show')->name('user.show');
    Route::get('user/create', 'CreateController@create')->name('user.create'); // Не знаю почему, но не хочет в ссылку прописываться '/create', сразу пишет не найдена страница. Пытался следовать конвенции
    Route::post('/', 'StoreController@store')->name('user.store');
    Route::get('/{user}/edit', 'EditController@edit')->name('user.edit');
    Route::patch('/{user}', 'UpdateController@update')->name('user.update');
    Route::delete('/{user}', 'DestroyController@destroy')->name('user.destroy');
});
