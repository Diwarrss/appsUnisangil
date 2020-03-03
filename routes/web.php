<?php
Auth::routes();

Route::group(['middleware' => ['guest']], function () {
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
    //BuzonSugerenciaController
    Route::post('buzon/save','BuzonSugerenciaController@save');
    //InscripcionPruebaController
    Route::get('inscripcion/downloadFile','InscripcionPruebaController@downloadFile');
});
Route::group(['middleware' => ['auth']], function () {
    //obtener la vista del admin al loguear
    Route::get('/home', 'HomeController@index')->name('home');
});
