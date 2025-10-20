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

Route::prefix('ventas')->group(function() {
  Route::get('/', 'VentasController@index');
  Route::get('/traerTratamiento', 'VentasController@traerTratamiento');
  Route::post('/agregarcliente', 'VentasController@agregarcliente');
  Route::post('/traerProducto', 'VentasController@traerProducto');
  Route::post('/TraerCupon', 'VentasController@TraerCupon');



});
