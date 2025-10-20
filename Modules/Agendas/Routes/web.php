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

Route::prefix('agendas')->group(function() {
  Route::get('/', 'AgendasController@inicio');
    Route::get('/inicio', 'AgendasController@inicio');
    Route::get('/tablaeventos', 'AgendasController@tablaeventos');
    Route::get('/create', 'AgendasController@create');
    Route::post('/create', 'AgendasController@store');
    Route::delete('/borrar', 'AgendasController@destroy');
    Route::get('/{id}/edit', 'AgendasController@edit');
    Route::post('/update', 'AgendasController@update');
    Route::post('/calendario', 'AgendasController@datos');
    Route::post('/VerEvento2', 'AgendasController@VerEvento');
    Route::post('/TraeDias', 'AgendasController@TraeDias');
    Route::post('/TraerDatosAgenda', 'AgendasController@TraerDatosAgenda');
    Route::post('/TraerDatosCita', 'AgendasController@TraerDatosCita');
    Route::post('/TraerDatoFechaEspecifica', 'AgendasController@TraerDatoFechaEspecifica');

    Route::post('/traerHoras', 'AgendasController@traerHoras');
    Route::post('/TraerClienteNum', 'AgendasController@TraerClienteNum');
    Route::post('/EliminarCita', 'AgendasController@EliminarCita');
    Route::post('/ExisteCliente', 'AgendasController@ExisteCliente');
    Route::post('/guardarPago', 'AgendasController@guardarPago');

    Route::get('vista/{id}', 'AgendasController@vistas');

    Route::post('/AgregarClienteEspera', 'AgendasController@AgregarClienteEspera');
    Route::post('/ClienteAgendado', 'AgendasController@ClienteAgendado');
    Route::post('/TraerServicio', 'AgendasController@TraerServicio');
    Route::post('/traerCita', 'AgendasController@traerCita');
    Route::post('/ExisteCita', 'AgendasController@ExisteCita');
    Route::post('/TraerProductillos', 'AgendasController@TraerProductillos');
    Route::post('/TraerDatosEmpleado', 'AgendasController@TraerDatosEmpleado');






});
