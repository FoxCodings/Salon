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

Route::prefix('catalogos2')->group(function() {
    Route::get('/', 'Catalogos2Controller@index');

    Route::prefix('servicios')->group(function() {
    Route::get('/', 'ServiciosController@index');
    Route::get('/tablaservicios', 'ServiciosController@tablaservicios');
    Route::get('/create', 'ServiciosController@create');
    Route::post('/create', 'ServiciosController@store');
    Route::delete('/borrar', 'ServiciosController@destroy');
    Route::get('/{id}/edit', 'ServiciosController@edit');
    Route::post('/update', 'ServiciosController@update');
    });

    Route::prefix('productos')->group(function() {
    Route::get('/', 'ProductosController@index');
    Route::get('/tablaproductos', 'ProductosController@tablaproductos');
    Route::get('/create', 'ProductosController@create');
    Route::post('/create', 'ProductosController@store');
    Route::delete('/borrar', 'ProductosController@destroy');
    Route::get('/{id}/edit', 'ProductosController@edit');
    Route::post('/update', 'ProductosController@update');
    });


    Route::prefix('listados')->group(function() {
    Route::get('/', 'ListadosController@index');
    Route::post('/GuardarProductos', 'ListadosController@GuardarProductos');
    Route::post('/TraerProductos', 'ListadosController@TraerProductos');
    Route::post('/EliminarProductos', 'ListadosController@EliminarProductos');
    Route::get('/descargarProductos', 'ListadosController@DescargarProductos');





    // Route::get('/tablaproductos', 'ProductosController@tablaproductos');
    // Route::get('/create', 'ProductosController@create');
    // Route::post('/create', 'ProductosController@store');
    // Route::delete('/borrar', 'ProductosController@destroy');
    // Route::get('/{id}/edit', 'ProductosController@edit');
    // Route::post('/update', 'ProductosController@update');
    });
});
