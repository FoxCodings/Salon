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

Route::prefix('ventas2')->group(function() {
    Route::get('/', 'Ventas2Controller@index');
    Route::get('/traerTratamiento', 'Ventas2Controller@traerTratamiento');
    Route::post('/agregarcliente', 'Ventas2Controller@agregarcliente');
    Route::post('/traerProducto', 'Ventas2Controller@traerProducto');
    Route::post('/TraerCupon', 'Ventas2Controller@TraerCupon');
    Route::post('/create', 'Ventas2Controller@store');
    Route::post('/traerPreventa', 'Ventas2Controller@traerPreventa');
    Route::post('/traerPreventa2', 'Ventas2Controller@traerPreventa2');

    Route::post('/preventaPago', 'Ventas2Controller@preventaPago');
    Route::post('/preventaPago2', 'Ventas2Controller@preventaPago2');

    Route::post('/NumerosLetras', 'Ventas2Controller@ConvertirLetras');

    Route::get('/ver_ventas', 'Ventas2Controller@ver_ventas');
    Route::get('/tablaventas', 'Ventas2Controller@tablaventas');
    Route::get('/{id}/show_venta', 'Ventas2Controller@show_venta');
    Route::get('/preventas', 'Ventas2Controller@preventas');
    Route::get('/tablapreventas', 'Ventas2Controller@tablapreventas');
    Route::post('/traerPreventas', 'Ventas2Controller@traerPreventas');
    Route::post('/traerProductos', 'Ventas2Controller@traerProductos');

    Route::get('/tablaliquidaciones', 'Ventas2Controller@tablaliquidaciones');
    Route::post('/traerLiquidacion', 'Ventas2Controller@traerLiquidacion');
    Route::post('/abonoPago', 'Ventas2Controller@abonoPago');

    Route::get('/articulos', 'Ventas2Controller@tablaarticulos');
    Route::get('/tablaProductosVenta', 'Ventas2Controller@tablaProductosVenta');

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
