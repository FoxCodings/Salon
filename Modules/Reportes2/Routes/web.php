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

Route::prefix('reportes2')->group(function() {
    Route::get('/', 'Reportes2Controller@index');
    Route::get('/reporteCliente/{id}/{fecha1}/{fecha2}', 'Reportes2Controller@Clientes');
    Route::get('/reporteEmpleado/{id}/{fecha3}/{fecha4}', 'Reportes2Controller@reporteEmpleado');
    Route::get('/reporteTotales/{fecha5}/{fecha6}', 'Reportes2Controller@reporteTotales');


});
