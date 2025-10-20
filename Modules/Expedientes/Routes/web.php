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

Route::prefix('expedientes')->group(function() {
  Route::get('/', 'ExpedientesController@index');
  Route::get('/tablaexpedientes', 'ExpedientesController@tablaexpedientes');
  Route::post('/tablaCarpeta', 'ExpedientesController@tablaCarpeta');
  Route::post('/tablaServicios', 'ExpedientesController@tablaServicios');

  Route::get('/{id}/vista', 'ExpedientesController@vista');

  Route::get('/{id},{id_servicio}/servicios', 'ExpedientesController@servicios');
  Route::get('/{id}/show', 'ExpedientesController@show');
  Route::get('/{id}/imprimir', 'ExpedientesController@imprimir');
  Route::post('/TraerServicio', 'ExpedientesController@TraerServicio');
  Route::post('/GuardarExpediente', 'ExpedientesController@GuardarExpediente');
  Route::post('/crearTablaformula', 'ExpedientesController@formula');
  Route::post('/eliminarFormula', 'ExpedientesController@eliminarFormula');





});
