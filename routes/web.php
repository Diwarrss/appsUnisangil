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
Auth::routes();

Route::get('/{any}', 'Auth\LoginController@index')->name('index')->where('any', '.*');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'AdminController@index')->where('any', '.*');
});

/* Route::get('admin', function () {
    return view('admin');
}); */
/* Route::group(['middleware' => 'guest'], function () {
}); */

/* Route::group(['middleware' => 'auth'], function () {

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    // Email Verification Routes...OK
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
}); */

//Route::get('/login', 'HomeController@index')->name('home');
