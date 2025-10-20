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

Route::prefix('promociones2')->group(function() {
    Route::get('/', 'Promociones2Controller@index');
    Route::get('/tablapromociones2', 'Promociones2Controller@tablapromociones2');
    Route::get('/create', 'Promociones2Controller@create');
    Route::get('/createcumpleanos', 'Promociones2Controller@createcumpleanos');
    Route::post('/create', 'Promociones2Controller@store');
    Route::post('/creates', 'Promociones2Controller@stores');
    Route::delete('/borrar', 'Promociones2Controller@destroy');
    Route::get('/{id}/edit', 'Promociones2Controller@edit');
    Route::post('/update', 'Promociones2Controller@update');
});
