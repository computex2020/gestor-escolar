<?php
Route::get('/', function () {
    return view('index');
});

Route::get('usuarios', 'UsuariosController@index');
Route::get('usuario/edit/{id}', 'UsuariosController@show');

Route::post('home','LoginController@index')->name('home');

Route::get('logout', 'LoginController@logout')->name('logout');
