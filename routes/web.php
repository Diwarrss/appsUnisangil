<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    //login usando credenciales y api de postgresql del vortal
    Route::get('/login-vortal', function () {
        return view('auth.login-vortal');
    });
    Route::get('/', function () {
        return view('home.intro');
    });
    Route::get('/services', function () {
        return view('home.services');
    });
    Route::get('/about', function () {
        return view('home.about');
    });
    Route::get('/news', function () {
        return view('home.news');
    });
    Route::get('/infrastructure', function () {
        return view('home.infrastructure');
    });
    //rutas para los servicios
    Route::get('/redes', function () {
        return view('home.redes');
    });
    Route::get('/seguridad', function () {
        return view('home.seguridad');
    });
    Route::get('/almacenamiento', function () {
        return view('home.almacenamiento');
    });
    Route::get('/directorio', function () {
        return view('home.directorio');
    });
    Route::get('/soporte', function () {
        return view('home.soporte');
    });
    Route::get('/sistemas', function () {
        return view('home.sistemas');
    });
    Route::get('/conceptos', function () {
        return view('home.conceptos');
    });
    Route::get('/cursos', function () {
        return view('home.cursos');
    });
    Route::get('/pruebas', function () {
        return view('home.pruebas');
    });
    Route::get('/licencias', function () {
        return view('home.licencias');
    });
    Route::get('/resources', function () {
        return view('home.resources');
    });

    //BuzonSugerenciaController
    Route::post('buzon/save','BuzonSugerenciaController@save');

    //NiveleController
    Route::get('nivel/getAll','NiveleController@getAll');

    //CursosController
    Route::get('curso/getAll','CursosController@getAll');

    //SedeController
    Route::get('sede/getAll','SedeController@getAll');

    //InscripcionPruebaController
    Route::get('insPruebas/downloadFile','InscripcionPruebaController@downloadFile');
    Route::post('insPruebas/save','InscripcionPruebaController@save');

    //InscripcionCursosController
    Route::get('insCursos/getInfoinProcess','InscripcionCursosController@getInfoinProcess');
    Route::post('insCursos/register','InscripcionCursosController@register');
    Route::post('insCursos/saveFile','InscripcionCursosController@saveFile');
    Route::get('insCursos/downloadFile','InscripcionCursosController@downloadFile');
});
Route::group(['middleware' => ['auth']], function () {
    //obtener la vista del admin al loguear
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'user'], function () {
        Route::get('getData', 'UserController@getData')->name('getData');
    });

    Route::group(['prefix' => 'insCursos'], function () {
        Route::get('getDataTable', 'InscripcionCursosController@getDataTable')->name('getDataTable');
        Route::post('updateState','InscripcionCursosController@updateState');
        Route::get('downloadPay','InscripcionCursosController@downloadPay');
    });

    Route::group(['prefix' => 'insCursos'], function () {
        Route::get('/', 'CursosController@index');
        Route::post('/', 'CursosController@store');
        Route::put('/', 'CursosController@update');
    });
});
