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

Route::prefix('empleados2')->group(function() {
    Route::get('/', 'Empleados2Controller@index');
    Route::get('/tablaempleados2', 'Empleados2Controller@tablaempleados2');
    Route::get('/create', 'Empleados2Controller@create');
    Route::get('/createImagen', 'Empleados2Controller@createImagen');
    Route::post('/create', 'Empleados2Controller@store');
    Route::delete('/borrar', 'Empleados2Controller@destroy');
    Route::get('/{id}/edit', 'Empleados2Controller@edit');
    Route::post('/update', 'Empleados2Controller@update');
    Route::get('/documento/{id}', 'Empleados2Controller@documento');
    Route::post('/Crearusuariocajero', 'Empleados2Controller@Crearusuariocajero');
    Route::post('/GuardarDias', 'Empleados2Controller@GuardarDias');
    Route::post('/ListAVacaciiones', 'Empleados2Controller@ListAVacaciiones');



});
