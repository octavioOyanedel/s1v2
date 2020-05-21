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
			if ($ruta === 'home' || $ruta === 'socios/create' || preg_match('/^socios\/([0-9]*)\/edit/', $ruta) || preg_match('/^socios\/([0-9]*)/', $ruta)){
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
			return array('Listar'=>'home','Incorporar'=>'socios.create');
		break;				
	}
}