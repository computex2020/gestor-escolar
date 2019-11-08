<?php
Route::get('/', function () {
    return view('index');
});

Route::post('home','LoginController@index')->name('home');

Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('usuarios', 'UsuariosController@index');
Route::get('usuario/edit/{id}', 'UsuariosController@show');
Route::get('usuario/new', 'UsuariosController@new');
Route::post('usuario/save', 'UsuariosController@save');
Route::post('usuario/saveusuariomenu', 'UsuariosController@saveusuariomenu');
Route::get('/usuario', ['as' => 'usuario.getree', 'uses' => 'UsuariosController@getree']);

Route::get('feriados', 'FeriadosController@index');

