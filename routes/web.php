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

Route::group(['prefix' => 'dashboard', 'middleware' => ['sentinel', 'sentinel.role']], function(){
    Route::get('/', 'MainController@siswa')->name('main');
    Route::get('/kelas', 'MainController@kelas')->name('main.kelas');
    Route::get('/guru', 'MainController@guru')->name('main.guru');
    Route::get('/mapel', 'MainController@mapel')->name('main.mapel');
    Route::get('/user', 'MainController@user')->name('main.user');
    Route::get('/jurusan', 'MainController@jurusan')->name('main.jurusan');
    Route::get('/nilai', 'MainController@nilai')->name('main.nilai');

    // Resource Controller
    Route::resource('/siswa', 'SiswaController', ['except' => ['index']]);
    Route::resource('/kelas', 'KelasController', ['except' => ['index']]);
    Route::resource('/guru', 'GuruController', ['except' => ['index']]);
    Route::resource('/jurusan', 'JurusanController', ['except' => ['index']]);
    Route::resource('/mapel', 'MapelController', ['except' => ['index']]);
    Route::resource('/nilai', 'NilaiController', ['except' => ['index']]);
    Route::resource('/user', 'UserController', ['except' => ['index']]);
});

// Users Login and Register
Route::get('login', 'UserController@login')->name('login');
Route::post('login', 'UserController@login_store')->name('login.store');
Route::get('logout', 'UserController@logout')->name('logout');

// Forgot Password
Route::get('forgot-password', 'UserController@forgot_create')->name('reminder.create');
Route::post('forgot-password', 'UserController@forgot_store')->name('reminder.store');
Route::get('forgot-password/{id}/{token}', 'UserController@forgot_edit')->name('reminder.edit');
Route::put('forgot-password/{id}/{token}', 'UserController@forgot_update')->name('reminder.update');