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
Route::group(['prefix' => '/'], function () {

    Route::get('/', 'GeneralController@accueil')->name('accueil');
});

Route::group(['prefix' => '/creation_quiz'], function () {

    Route::get('/', 'CreationQuizController@index')->name('creation_quiz');

});

Route::group(['prefix' => '/liste'], function () {

    Route::get('/', 'ListeQuizController@index')->name('liste_quiz');
    Route::get('/{numero}', 'ListeQuizController@quiz')->name('quiz');
});

Route::group(['prefix' => '/admin'], function () {

    Route::get('/', 'AdminController@index')->name('admin_panel');
    Route::get('/{id_user}', 'AdminController@changeRole');
});

Auth::routes();

Route::get('/logout', 'HomeController@logout')->name('logout');
