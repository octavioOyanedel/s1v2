<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Usuario
|--------------------------------------------------------------------------|
*/

Route::resource('/usuarios', 'UserController');

/*
 * Ajax
 */
Route::get('/correos_reset', 'UserController@existeCorreo');
