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

Route::prefix('usuarios')->group(function() {
    Route::get('/', 'UsuariosController@index');
    Route::get('/tablausuarios', 'UsuariosController@tablausuarios');
    Route::get('/create', 'UsuariosController@create');
    Route::post('/create', 'UsuariosController@store');
    Route::delete('/borrar', 'UsuariosController@destroy');
    Route::get('/{id}/edit', 'UsuariosController@edit');
    Route::put('/{id}', 'UsuariosController@update');
    Route::post('/archivos', 'UsuariosController@archivos');
    Route::get('/archivos', 'UsuariosController@archivosview');
    Route::get('/tablaarchivos', 'UsuariosController@tablaarchivos');
    Route::post('/Eliminararchivos', 'UsuariosController@Eliminararchivos');
    Route::post('/as', 'UsuariosController@as');
    Route::post('/loginAs', 'UsuariosController@as2');
    Route::get('/notificaciones', 'UsuariosController@notificaciones');
    Route::post('/enviarnotificacion', 'UsuariosController@enviarnotificacion');
    Route::get('/tablamensaje', 'UsuariosController@tablamensaje');
    Route::post('/verMensajes', 'UsuariosController@verMensajes');
    Route::post('/EliminarMensajes', 'UsuariosController@EliminarMensajes');
    Route::post('/api', 'UsuariosController@api');








    Route::prefix('/roles')->group(function() {
    Route::get('/', 'RolesController@index');
    Route::get('/tablaroles', 'RolesController@tablaroles');
    Route::get('/create', 'RolesController@create');
    Route::post('/create', 'RolesController@store');
    Route::delete('/borrar', 'RolesController@destroy');
    Route::get('/{id}/edit', 'RolesController@edit');
    Route::put('/{id}', 'RolesController@update');

    });

    Route::prefix('/permisos')->group(function() {
        Route::get('/', 'PermisosController@index');
        Route::get('/tablapermisos', 'PermisosController@tablapermisos');
        Route::get('/create', 'PermisosController@create');
        Route::post('/create', 'PermisosController@store');
        Route::delete('/borrar', 'PermisosController@destroy');
        Route::get('/{id}/edit', 'PermisosController@edit');
        Route::post('/update', 'PermisosController@update');
        Route::post('/virificarpermiso', 'PermisosController@virificarpermiso');


    });

});
