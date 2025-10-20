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

Route::prefix('clientes')->group(function() {
    Route::get('/', 'ClientesController@index');
    Route::get('/tablaclientes', 'ClientesController@tablaclientes');
    Route::get('/create', 'ClientesController@create');
    Route::post('/create', 'ClientesController@store');
    Route::delete('/borrar', 'ClientesController@destroy');
    Route::get('/{id}/edit', 'ClientesController@edit');
    Route::post('/update', 'ClientesController@update');
});
