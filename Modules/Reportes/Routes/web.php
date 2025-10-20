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

Route::prefix('reportes')->group(function() {
  Route::get('/', 'ReportesController@index');
  Route::get('/reporteNomina/{fecha1}/{fecha2}', 'ReportesController@Nomina');
  Route::get('/reporteCliente/{empleado}/{fecha1}/{fecha2}', 'ReportesController@NominaEmpleado');

});
