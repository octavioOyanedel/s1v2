<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Ajax
|--------------------------------------------------------------------------|
*/
// SOCIO
Route::get('/cargar_comunas', 'SelectController@comunas')->name('cargar_comunas');
Route::get('/cargar_areas', 'SelectController@areas')->name('cargar_areas');

// ESTUDIOS
Route::get('/cargar_establecimientos', 'SelectController@establecimientos')->name('cargar_establecimientos');
Route::get('/cargar_titulos', 'SelectController@titulos')->name('cargar_titulos');

// LOGIn
Route::get('/correos_reset', 'UserController@existeCorreo');

//nuevos módulo socio
Route::get('/create_urbe', 'UrbeController@crearViaAjax');
Route::get('/create_sede', 'SedeController@crearViaAjax');
Route::get('/create_cargo', 'CargoController@crearViaAjax');
Route::get('/create_ciudadania', 'CiudadaniaController@crearViaAjax');
Route::get('/create_comuna', 'ComunaController@crearViaAjax');
Route::get('/create_area', 'AreaController@crearViaAjax');
Route::get('/create_parentesco', 'ParentescoController@crearViaAjax');
Route::get('/create_grado', 'GradoController@crearViaAjax');
Route::get('/create_fase', 'FaseController@crearViaAjax');