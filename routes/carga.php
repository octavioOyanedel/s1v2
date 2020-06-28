<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Cargas Familiares
|--------------------------------------------------------------------------|
*/

Route::resource('/cargas', 'CargaController');

Route::get('/form_filtro_cargas', 'CargaController@formFiltro')->name('form_filtro_cargas');

Route::get('/filtrar_cargas', 'CargaController@filtrarCargas')->name('filtrar_cargas');

Route::get('/cargas_listar', 'CargaController@listar')->name('cargas_listar');