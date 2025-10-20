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

Route::prefix('empleados')->group(function() {
    Route::get('/', 'EmpleadosController@index');
    Route::get('/tablaempleados', 'EmpleadosController@tablaempleados');
    Route::get('/create', 'EmpleadosController@create');
    Route::get('/createImagen', 'EmpleadosController@createImagen');
    Route::post('/create', 'EmpleadosController@store');
    Route::delete('/borrar', 'EmpleadosController@destroy');
    Route::get('/{id}/edit', 'EmpleadosController@edit');
    Route::post('/update', 'EmpleadosController@update');
    Route::get('/documento/{id}', 'EmpleadosController@documento');
    Route::post('/Crearusuariocajero', 'EmpleadosController@Crearusuariocajero');
    Route::post('/GuardarDias', 'EmpleadosController@GuardarDias');
    Route::post('/ListAVacaciiones', 'EmpleadosController@ListAVacaciiones');



});
