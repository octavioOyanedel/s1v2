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
	        return 'inc.forms.login';
	        break;
	    case "password.email":
	        return 'inc.forms.reset';
	        break;	 	        	             	        	                               
	}
}