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

Route::prefix('promociones')->group(function() {
  Route::get('/', 'PromocionesController@index');
  Route::get('/tablapromociones', 'PromocionesController@tablapromociones');
  Route::get('/create', 'PromocionesController@create');
  Route::get('/createcumpleanos', 'PromocionesController@createcumpleanos');
  Route::post('/create', 'PromocionesController@store');
  Route::post('/creates', 'PromocionesController@stores');
  Route::delete('/borrar', 'PromocionesController@destroy');
  Route::get('/{id}/edit', 'PromocionesController@edit');
  Route::post('/update', 'PromocionesController@update');
});
