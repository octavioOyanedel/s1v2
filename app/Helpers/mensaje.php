<?php

/**
 * Descripción: obtener icono de alerta
 * Entrada/s: string nombre 
 * Salida: string alerta
 */
function obtenerIcono($nombre)
{
	switch ($nombre) {
		case "alerta":
			return 'fa-exclamation-triangle';
		break;
	
	}
}

/**
 * Descripción: obtener mensaje de alerta
 * Entrada/s: string nombre 
 * Salida: string mensaje
 */
function obtenerMensaje($nombre)
{
	switch ($nombre) {
		case "reset_correo":
			return 'Se enviará enlace de recuperación a cuenta de correo registrada en sistema. Si no recuerda email contactarse con administrador.';
		break;		
		case "campos_obligatorio":
			return '* Campos obligatorios.';
		break;
		case "eliminar_mismo_usuario":
			return 'Si elimina su cuenta de usuario la aplicación se cerrará y no podrá ingresar nuevamente. ¿Está seguro/a que desea eliminar su cuenta de usuario?';
		break;
		case "eliminar_usuario_normal":
			return '¿Está seguro/a que desea eliminar a este usuario?';
		break;
		case "eliminar_socio":
			return '¿Está seguro/a que desea eliminar a este socio?. De ser así, seleccione una categoría para registrar motivo de desvinculación.';
		break;
		case "reincorporar_socio":
			return '¿Está seguro/a que desea reincorporar a este socio?';
		break;				
	}
}