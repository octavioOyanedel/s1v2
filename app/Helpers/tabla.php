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
		case "ver_usuario":
			return 'inc.tablas.usuarios.mostrar';
		break;
	}
}

/**
 * Descripción: obtener cabeceras y su respectiva clase de aliniamiento
 * Entrada/s: string nombre de tabla
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerCabecerasTablas($nombre)
{
	switch ($nombre) {	
		case "usuarios":
			return array('Nombre'=>'','Correo'=>'','Privilegio'=>'');
		break;
		case "ver_usuario":
			return array('Nombre'=>'nombre1','Correo'=>'email','Privilegio'=>'privilegio_id','Fecha de Creación'=>'created_at','Última Actualización'=>'updated_at' );
		break;				
	}
}