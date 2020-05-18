<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Ajax
|--------------------------------------------------------------------------|
*/

Route::get('/cargar_comunas', 'SelectController@comunas')->name('cargar_comunas');
Route::get('/cargar_areas', 'SelectController@areas')->name('cargar_areas');

Route::get('/correos_reset', 'UserController@existeCorreo');

Route::get('/create_urbe', 'UrbeController@crearViaAjax');
Route::get('/create_sede', 'SedeController@crearViaAjax');
Route::get('/create_cargo', 'CargoController@crearViaAjax');
Route::get('/create_ciudadania', 'CiudadaniaController@crearViaAjax');
