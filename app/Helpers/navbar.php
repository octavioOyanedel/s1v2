<?php


/**
 * Descripción: obtener nombre de enlace y rutas para navbar
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y ruta
 */
function obtenerEnlacesNav($nombre)
{
	switch ($nombre) {
		case "usuario":
			return array('Editar usuario'=>'home','Cambiar contraseña'=>'password.reset','Salir'=>'logout');
		break;			
	}
}