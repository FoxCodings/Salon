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

Route::prefix('nomina2')->group(function() {
    Route::get('/', 'Nomina2Controller@index');
    Route::get('/tablanomina2', 'Nomina2Controller@tablanomina2');
    Route::get('/{id}/show', 'Nomina2Controller@show');
    Route::get('/{id}/historial', 'Nomina2Controller@historial');
    Route::get('/{id}/pagos', 'Nomina2Controller@pagos');
    Route::post('/tablahistorial', 'Nomina2Controller@tablahistorial');

    Route::post('/BuscarPagos', 'Nomina2Controller@BuscarPagos');
    Route::post('/crearHistorial', 'Nomina2Controller@crearHistorial');
    Route::post('/TrerComisionesExtras', 'Nomina2Controller@TrerComisionesExtras');


});
