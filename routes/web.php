<?php

Route::get('/', 'ClientesController@index');
Route::get('cliente/{id}', 'ClientesController@show');

