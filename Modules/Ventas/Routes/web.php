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
  Route::post('/create', 'VentasController@store');
  Route::post('/traerPreventa', 'VentasController@traerPreventa');
  Route::post('/traerPreventa2', 'VentasController@traerPreventa2');

  Route::post('/preventaPago', 'VentasController@preventaPago');
  Route::post('/preventaPago2', 'VentasController@preventaPago2');

  Route::post('/NumerosLetras', 'VentasController@ConvertirLetras');

  Route::get('/ver_ventas', 'VentasController@ver_ventas');
  Route::get('/tablaventas', 'VentasController@tablaventas');
  Route::get('/{id}/show_venta', 'VentasController@show_venta');
  Route::get('/preventas', 'VentasController@preventas');
  Route::get('/tablapreventas', 'VentasController@tablapreventas');
  Route::post('/traerPreventas', 'VentasController@traerPreventas');
  Route::post('/cambiar', 'VentasController@cambiar');


  Route::get('/tablaliquidaciones', 'VentasController@tablaliquidaciones');
  Route::post('/traerLiquidacion', 'VentasController@traerLiquidacion');
  Route::post('/abonoPago', 'VentasController@abonoPago');

  Route::get('/articulos', 'VentasController@tablaarticulos');
  Route::get('/tablaProductosVenta', 'VentasController@tablaProductosVenta');

  Route::post('/traerProductos', 'VentasController@traerProductos');

  Route::prefix('certificados')->group(function() {
  Route::get('/', 'CertificadosController@index');
  Route::get('/tablacertificados', 'CertificadosController@tablacertificados');
  Route::get('/create', 'CertificadosController@create');
  Route::post('/create', 'CertificadosController@store');
  Route::delete('/borrar', 'CertificadosController@destroy');
  Route::get('/{id}/edit', 'CertificadosController@edit');
  Route::get('/{id}/imprimir', 'CertificadosController@imprimir');
  Route::get('/{id}/imprimirposterior', 'CertificadosController@imprimirposterior');

  Route::post('/update', 'CertificadosController@update');
  });




});
