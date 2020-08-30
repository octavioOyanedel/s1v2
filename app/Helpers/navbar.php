<?php

/**
 * Descripción: Evalua si enlace nav esta activo
 * Entrada/s: ruta
 * Salida: string '' o active
 */
function esActive($ruta, $titulo)
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
		case 'socios':
			if ($ruta === 'home' || $ruta === 'socios/create' || preg_match('/^socios\/([0-9]*)\/edit/', $ruta) || preg_match('/^socios\/([0-9]*)/', $ruta) || $ruta === 'form_filtro_socios' || strpos($ruta, 'filtrar_socios') !== FALSE || $ruta === 'estudios/create' || preg_match('/^estudios\/([0-9]*)\/edit/', $ruta) || $ruta === 'estudios' || $ruta === 'buscar' || preg_match('/^mostrar_desvinculado\/([0-9]*)/', $ruta) || preg_match('/^estudios\/([0-9]*)/', $ruta)){
			    return 'active';
			}	
		break;	
		case 'cargas':
			if ($ruta === 'cargas' || $ruta === 'cargas/create' || preg_match('/^cargas\/([0-9]*)\/edit/', $ruta) || preg_match('/^cargas\/([0-9]*)/', $ruta) || $ruta === 'form_filtro_cargas' || strpos($ruta, 'filtrar_cargas') !== FALSE || $ruta === 'cargas_listar'){
			    return 'active';
			}	
		break;
		case 'préstamos':
			if ($ruta === 'abonos/create' || $ruta === 'prestamos' || $ruta === 'prestamos/create' || preg_match('/^prestamos\/([0-9]*)\/edit/', $ruta)){
			    return 'active';
			}	
		break;					
		default:
			return '';
			break;
	}
}

/**
 * Descripción: obtener nombre de enlace y rutas para navbar
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y ruta
 */
function obtenerEnlacesNav($nombre)
{
	switch ($nombre) {
		case "usuario":
			return array('Editar usuario'=>'usuarios.edit','Cambiar contraseña'=>'form_editar_passwd','Salir'=>'logout');
		break;
		case "usuarios":
			return array('Listar'=>'usuarios.index','Crear'=>'usuarios.create');
		break;		
		case "socios":
			return array('Listar'=>'home','Incorporar'=>'socios.create','Filtrar'=>'form_filtro_socios','Agregar Estudio'=>'estudios.create');
		break;
		case "cargas":
			return array('Listar'=>'cargas.index','Agregar'=>'cargas.create','Filtrar'=>'form_filtro_cargas');
		break;
		case "préstamos":
			return array('Listar'=>'prestamos.index','Solicitar'=>'prestamos.create','Filtrar'=>'home');
		break;				
	}
}