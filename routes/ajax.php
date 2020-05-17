<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Ajax
|--------------------------------------------------------------------------|
*/

Route::get('/cargar_ciudades', 'SelectController@ciudades')->name('cargar_ciudades');
Route::get('/cargar_areas', 'SelectController@areas')->name('cargar_areas');

Route::get('/correos_reset', 'UserController@existeCorreo');

// corrección	Comuna === urbes
// 				Ciudad === comunas
Route::get('/create_urbe', 'ComunaController@crearViaAjax');