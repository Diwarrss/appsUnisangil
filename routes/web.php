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
});
Route::group(['middleware' => ['auth']], function () {
    //obtener la vista del admin al loguear
    Route::get('/home', 'HomeController@index')->name('home');
});
