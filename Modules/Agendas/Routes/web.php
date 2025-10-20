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
  Route::get('/', 'AgendasController@index');
  Route::get('/tablaeventos', 'AgendasController@tablaeventos');
  Route::get('/create', 'AgendasController@create');
  Route::post('/create', 'AgendasController@store');
  Route::delete('/borrar', 'AgendasController@destroy');
  Route::get('/{id}/edit', 'AgendasController@edit');
  Route::post('/update', 'AgendasController@update');
  Route::post('/calendario', 'AgendasController@datos');
  Route::post('/VerEvento', 'AgendasController@VerEvento');


});
