<?php

/**
 * Descripción: Evalua si enlace mantenedor esta activo
 * Entrada/s: ruta
 * Salida: string '' o active
 */
function esActiveMantenedor($ruta, $titulo)
{
	switch ($titulo) {
		case 'usuario':
			if (preg_match('/^usuario\/([0-9]*)\/edit/', $ruta) || $ruta === 'password/form/editar'){
			    return 'active';
			}	
		break;
		case 'usuarios':
			if (preg_match('/^usuarios\/([0-9]*)/', $ruta) || $ruta === 'usuarios' || $ruta === 'usuarios/create'){
			    return 'active';
			}	
		break;		
		default:
			return '';
			break;
	}
}

/**
 * Descripción: obtener nombre de enlace y rutas para mantenedor
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y ruta
 */
function obtenerEnlacesMantenedor($ruta)
{
	if(preg_match('/^usuario\/([0-9]*)\/edit/', $ruta) || $ruta === 'password/form/editar' || preg_match('/^usuarios\/([0-9]*)/', $ruta) || $ruta === 'usuarios' || $ruta === 'usuarios/create'){
		return array('Privilegio'=>'home');
	}

	if($ruta === 'home' || $ruta === 'socios/create' || preg_match('/^socios\/([0-9]*)\/edit/', $ruta) || preg_match('/^socios\/([0-9]*)/', $ruta) || $ruta === 'form_filtro_socios' || $ruta === 'buscar' || strpos($ruta, 'filtrar_socios') !== FALSE || preg_match('/^mostrar_desvinculado\/([0-9]*)/', $ruta) || $ruta === 'cargas/create'){
		return array('Área'=>'home','Cargo'=>'home','Ciudad'=>'home','Comuna'=>'home','Nacionalidad'=>'home','Sede'=>'home','Situación'=>'home');
	}
	
	
}