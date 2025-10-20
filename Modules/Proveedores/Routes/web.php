<?php

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

Route::prefix('proveedores')->group(function() {
    Route::get('/', 'ProveedoresController@index');
    Route::get('/tablaproveedores', 'ProveedoresController@tablaproveedores');
    Route::get('/create', 'ProveedoresController@create');
    Route::post('/create', 'ProveedoresController@store');
    Route::delete('/borrar', 'ProveedoresController@destroy');
    Route::get('/{id}/edit', 'ProveedoresController@edit');
    Route::post('/update', 'ProveedoresController@update');
});
