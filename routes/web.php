<?php
Route::get('/', function () {
    return view('index');
});

Route::get('usuarios', 'UsuariosController@index');
Route::get('usuario/edit/{id}', 'UsuariosController@show');
Route::get('usuario/new', 'UsuariosController@new');
Route::post('usuario/save', 'UsuariosController@save');
Route::post('usuario/saveusuariomenu', 'UsuariosController@saveusuariomenu');
//Route::get('usuario/edit/getmenu', 'UsuariosController@getree');
Route::get('/usuario', ['as' => 'usuario.getree', 'uses' => 'UsuariosController@getree']);

Route::post('home','LoginController@index')->name('home');

Route::get('logout', 'LoginController@logout')->name('logout');
