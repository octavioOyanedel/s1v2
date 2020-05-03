<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Usuario
|--------------------------------------------------------------------------|
*/

Route::resource('/usuarios', 'UserController');
// editar password
Route::get('/password/form/editar', 'UserController@formEditarPassword')->name('form_editar_passwd');
Route::put('/password/editar', 'UserController@editarPassword')->name('editar_passwd');

/*
 * Ajax
 */
Route::get('/correos_reset', 'UserController@existeCorreo');
