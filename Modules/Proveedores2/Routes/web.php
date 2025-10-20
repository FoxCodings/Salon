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

Route::prefix('proveedores2')->group(function() {
    Route::get('/', 'Proveedores2Controller@index');
    Route::get('/tablaproveedores2', 'Proveedores2Controller@tablaproveedores2');
    Route::get('/create', 'Proveedores2Controller@create');
    Route::post('/create', 'Proveedores2Controller@store');
    Route::delete('/borrar', 'Proveedores2Controller@destroy');
    Route::get('/{id}/edit', 'Proveedores2Controller@edit');
    Route::post('/update', 'Proveedores2Controller@update');
});
