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

Route::prefix('catalogos')->group(function() {
    //Route::get('/', 'CatalogosController@index');


    Route::prefix('alaciados')->group(function() {
        Route::get('/', 'AlaciadosController@index');
        Route::get('/tablaalaciados', 'AlaciadosController@tablaalaciados');
        Route::get('/create', 'AlaciadosController@create');
        Route::post('/create', 'AlaciadosController@store');
        Route::delete('/borrar', 'AlaciadosController@destroy');
        Route::get('/{id}/edit', 'AlaciadosController@edit');
        Route::post('/update', 'AlaciadosController@update');
    });



    Route::prefix('cabellos')->group(function() {
        Route::get('/', 'CabellosController@index');
        Route::get('/tablacabellos', 'CabellosController@tablacabellos');
        Route::get('/create', 'CabellosController@create');
        Route::post('/create', 'CabellosController@store');
        Route::delete('/borrar', 'CabellosController@destroy');
        Route::get('/{id}/edit', 'CabellosController@edit');
        Route::post('/update', 'CabellosController@update');
    });

    Route::prefix('fasts')->group(function() {
        Route::get('/', 'FastsController@index');
        Route::get('/tablafasts', 'FastsController@tablafasts');
        Route::get('/create', 'FastsController@create');
        Route::post('/create', 'FastsController@store');
        Route::delete('/borrar', 'FastsController@destroy');
        Route::get('/{id}/edit', 'FastsController@edit');
        Route::post('/update', 'FastsController@update');
    });


    Route::prefix('peinados')->group(function() {
        Route::get('/', 'PeinadosController@index');
        Route::get('/tablapeinados', 'PeinadosController@tablapeinados');
        Route::get('/create', 'PeinadosController@create');
        Route::post('/create', 'PeinadosController@store');
        Route::delete('/borrar', 'PeinadosController@destroy');
        Route::get('/{id}/edit', 'PeinadosController@edit');
        Route::post('/update', 'PeinadosController@update');
    });

    Route::prefix('pestanas')->group(function() {
        Route::get('/', 'PestanasController@index');
        Route::get('/tablapestanas', 'PestanasController@tablapestanas');
        Route::get('/create', 'PestanasController@create');
        Route::post('/create', 'PestanasController@store');
        Route::delete('/borrar', 'PestanasController@destroy');
        Route::get('/{id}/edit', 'PestanasController@edit');
        Route::post('/update', 'PestanasController@update');
    });

    Route::prefix('servicios_a')->group(function() {
        Route::get('/', 'ServiciosAController@index');
        Route::get('/tablaservicios_a', 'ServiciosAController@tablaservicios_a');
        Route::get('/create', 'ServiciosAController@create');
        Route::post('/create', 'ServiciosAController@store');
        Route::delete('/borrar', 'ServiciosAController@destroy');
        Route::get('/{id}/edit', 'ServiciosAController@edit');
        Route::post('/update', 'ServiciosAController@update');
    });

    Route::prefix('servicios_ex')->group(function() {
        Route::get('/', 'ServiciosEXController@index');
        Route::get('/tablaservicios_ex', 'ServiciosEXController@tablaservicios_ex');
        Route::get('/create', 'ServiciosEXController@create');
        Route::post('/create', 'ServiciosEXController@store');
        Route::delete('/borrar', 'ServiciosEXController@destroy');
        Route::get('/{id}/edit', 'ServiciosEXController@edit');
        Route::post('/update', 'ServiciosEXController@update');
    });

    Route::prefix('shellacs')->group(function() {
        Route::get('/', 'ShellacController@index');
        Route::get('/tablashellacs', 'ShellacController@tablashellacs');
        Route::get('/create', 'ShellacController@create');
        Route::post('/create', 'ShellacController@store');
        Route::delete('/borrar', 'ShellacController@destroy');
        Route::get('/{id}/edit', 'ShellacController@edit');
        Route::post('/update', 'ShellacController@update');
    });


});
