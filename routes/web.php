<?php

//Route::get('/', 'ClientesController@index');
//Route::get('cliente/{id}', 'ClientesController@show');
Route::get('/', function () {
    return view('index');
});

Route::post('home','LoginController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
