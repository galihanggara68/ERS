<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => 'dashboard'], function(){
    Route::get('/', 'MainController@siswa');
    Route::get('/kelas', 'MainController@kelas');
    Route::get('/guru', 'MainController@guru');
    Route::get('/mapel', 'MainController@mapel');
    Route::get('/user', 'MainController@user');
    Route::get('/jurusan', 'MainController@jurusan');
    Route::get('/nilai', 'MainController@nilai');

    // Resource Controller
    Route::resource('/siswa', 'SiswaController', ['except' => ['index']]);
    Route::resource('/kelas', 'KelasController', ['except' => ['index']]);
    Route::resource('/guru', 'GuruController', ['except' => ['index']]);
    Route::resource('/jurusan', 'JurusanController', ['except' => ['index']]);
    Route::resource('/mapel', 'MapelController', ['except' => ['index']]);
    Route::resource('/nilai', 'NilaiController', ['except' => ['index']]);
    Route::resource('/user', 'UserController', ['except' => ['index']]);
});
