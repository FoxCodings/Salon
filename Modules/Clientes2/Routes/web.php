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

Route::prefix('clientes2')->group(function() {
    Route::get('/', 'Clientes2Controller@index');
    Route::get('/tablaclientes2', 'Clientes2Controller@tablaclientes2');
    Route::get('/create', 'Clientes2Controller@create');
    Route::post('/create', 'Clientes2Controller@store');
    Route::delete('/borrar', 'Clientes2Controller@destroy');
    Route::get('/{id}/edit', 'Clientes2Controller@edit');
    Route::post('/update', 'Clientes2Controller@update');
});
