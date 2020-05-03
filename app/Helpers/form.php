<?php

/**
 * Descripción: Obtener ruta para completar csrf según formulario
 * Entrada/s: string con nombre de método de formularios
 * Salida: string con ruta de include con csrf
 */
function obtenerCsrf($nombre)
{
	switch ($nombre) {
	    case "put":
	        return 'inc.csrf.put';
	        break;
	    case "delete":
	        return 'inc.csrf.delete';
	        break;	        
	    default:
	        return 'inc.csrf.post';
	}
}

/**
 * Descripción: Obtener ruta con contenido de formulario
 * Entrada/s: string con nombre de formulario
 * Salida: string con nombre de ruta
 */
function cargarFormulario($action)
{
	switch ($action) {
	    case "login":
	        return 'inc.forms.auth.login';
	        break;
	    case "password.email":
	        return 'inc.forms.auth.reset';
	        break;
	    case "password.update":
	        return 'inc.forms.auth.reset_ok';
	        break;
	    case "usuarios.update":
	        return 'inc.forms.usuario.editar';
	        break;		                	        	             	        	                               
	}
}

/**
 * Descripción: Obtener colección para poblar select
 * Entrada/s: array asociativo de colecciones
 * Salida: coleccion Collection
 */
function obtenerColeccion($colecciones, $nombre)
{
	if($colecciones != null){
		return $colecciones[$nombre];
	}	
}

/**
 * Descripción: Obtener objetos
 * Entrada/s: array asociativo de objetos
 * Salida: objeto
 */
function obtenerObjeto($objetos, $nombre)
{
	if($objetos != null){
		return $objetos[$nombre];
	}
}

/**
 * Descripción: Obtener nombre de campo para mostrar registro
 * Entrada/s: String nombre 
 * Salida: comentario
 */
function obtenerNombreObjeto($objeto, $nombre)
{
	switch ($nombre) {
	    case "banca_id":
	        return $objeto->numero;
	        break;
	    case "renta_id":
	        return $objeto->valor;
	        break;	     
	    default:
	        return $objeto->nombre;	        	        	                               
	}
}

/**
 * Descripción: Otorga dinámicamente di option lleva atributo selected 
 * Entrada/s: string campo old
 * Salida: string selected o string vacío
 */
function estaSelected($id, $idObjeto)
{

	if($id != '' && $id != null && $idObjeto != '' && $idObjeto != null){
		if(intval($id) === intval($idObjeto)){
			return 'selected';
		}
	}
	return '';
}

/**
 * Descripción: Obtener id desde parametro requestUri de request
 * Entrada/s: string requestUri
 * Salida: int id
 */
function obtenerIdDesdeRequestUri($ruta)
{
	return intval(substr(strrchr($ruta,"/"),1));
}