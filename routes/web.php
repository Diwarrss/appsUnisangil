<?php

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
    Route::get('/team', function () {
        return view('home.team');
    });
});

Auth::routes();
//obtener la vista del admin al loguear
Route::get('/home', 'HomeController@index')->name('home');
