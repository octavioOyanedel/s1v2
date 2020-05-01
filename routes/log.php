<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Usuario
|--------------------------------------------------------------------------|
*/

Route::resource('/log', 'LogController');

/*
 * Ajax
 */
Route::get('/log_reset', 'LogController@registrarEnvioReset');