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

Route::prefix('agenda2')->group(function() {
  Route::get('/', 'Agenda2Controller@inicio');
    Route::get('/inicio', 'Agenda2Controller@inicio');
    Route::get('/tablaeventos', 'Agenda2Controller@tablaeventos');
    Route::get('/create', 'Agenda2Controller@create');
    Route::post('/create', 'Agenda2Controller@store');
    Route::delete('/borrar', 'Agenda2Controller@destroy');
    Route::get('/{id}/edit', 'Agenda2Controller@edit');
    Route::post('/update', 'Agenda2Controller@update');
    Route::post('/calendario', 'Agenda2Controller@datos');
    Route::post('/VerEvento2', 'Agenda2Controller@VerEvento');
    Route::post('/TraeDias', 'Agenda2Controller@TraeDias');
    Route::post('/TraerDatosAgenda', 'Agenda2Controller@TraerDatosAgenda');
    Route::post('/TraerDatosCita', 'Agenda2Controller@TraerDatosCita');
    Route::post('/TraerDatoFechaEspecifica', 'Agenda2Controller@TraerDatoFechaEspecifica');

    Route::post('/traerHoras', 'Agenda2Controller@traerHoras');
    Route::post('/TraerClienteNum', 'Agenda2Controller@TraerClienteNum');
    Route::post('/EliminarCita', 'Agenda2Controller@EliminarCita');
    Route::post('/ExisteCliente', 'Agenda2Controller@ExisteCliente');

    Route::get('vista/{id}', 'Agenda2Controller@vistas');

    Route::post('/AgregarClienteEspera', 'Agenda2Controller@AgregarClienteEspera');
    Route::post('/ClienteAgendado', 'Agenda2Controller@ClienteAgendado');




});
