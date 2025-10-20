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

Route::prefix('nomina')->group(function() {
    Route::get('/', 'NominaController@index');
    Route::get('/tablanominas', 'NominaController@tablanominas');
    Route::get('/create', 'NominaController@create');
    Route::post('/create', 'NominaController@store');
    Route::delete('/borrar', 'NominaController@destroy');
    Route::get('/{id}/edit', 'NominaController@edit');
    Route::post('/update', 'NominaController@update');
});
