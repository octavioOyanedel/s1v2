<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Usuario
|--------------------------------------------------------------------------|
*/

Route::resource('/socios', 'SocioController');

Route::get('/mostrar_desvinculado/{id}', 'SocioController@mostrarDesvinculado')->name('mostrar_desvinculado');

Route::get('/form_filtro_socios', 'SocioController@formFiltro')->name('form_filtro_socios');

Route::get('/filtrar_socios', 'SocioController@filtrarSocios')->name('filtrar_socios');

Route::post('/reincorporar/{id}', 'SocioController@reincorporar')->name('reincorporar');
