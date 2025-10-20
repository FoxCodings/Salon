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
    Route::get('/', 'Agenda2Controller@index');
    Route::get('/tablaeventos', 'Agenda2Controller@tablaeventos');
    Route::get('/create', 'Agenda2Controller@create');
    Route::post('/create', 'Agenda2Controller@store');
    Route::delete('/borrar', 'Agenda2Controller@destroy');
    Route::get('/{id}/edit', 'Agenda2Controller@edit');
    Route::post('/update', 'Agenda2Controller@update');
    Route::post('/calendario', 'Agenda2Controller@datos');
});
