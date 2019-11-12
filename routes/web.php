<?php
Route::get('/', function () {
    return view('index', ['body_class' => 'bg-image']);
});

Route::post('home','LoginController@index')->name('home');

Route::get('/logout', 'LogoutController@logout');

Route::get('usuarios', 'UsuariosController@index');
Route::get('usuario/edit/{id}', 'UsuariosController@show');
Route::get('usuario/new', 'UsuariosController@new');
Route::post('usuario/save', 'UsuariosController@save');
Route::post('usuario/saveusuariomenu', 'UsuariosController@saveusuariomenu');
Route::get('/usuario', ['as' => 'usuario.getree', 'uses' => 'UsuariosController@getree']);

Route::get('feriados', 'FeriadosController@index');

