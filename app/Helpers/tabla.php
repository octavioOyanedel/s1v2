<?php

/**
 * Descripción: obtener ruta para carga dinámica de ncontenido tabla
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerContenidoTabla($nombre)
{
	switch ($nombre) {
		case "usuarios":
			return 'inc.tablas.usuarios.listar';
		break;
	}
}

/**
 * Descripción: obtener cabeceras y su respectiva clase de aliniamiento
 * Entrada/s: string nombre de tabla
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerCabederasTablas($nombre)
{
	switch ($nombre) {	
		case "usuarios":
			return array('Nombre'=>'','Correo'=>'','Privilegio'=>'');
		break;		
	}
}