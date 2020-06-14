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
 * Entrada/s: string mensaje 
 * Salida: string mensaje
 */
function obtenerMensaje($mensaje)
{
	switch ($mensaje) {
		case "reset_correo":
			return 'Se enviará enlace de recuperación a cuenta de correo registrada en sistema. Si no recuerda email contactarse con administrador.';
		break;		
		case "campos_obligatorio":
			return '* Campos obligatorios.';
		break;
		case "campos_obligatorio_rut":
			return '* Campos obligatorios. Para buscar RUT en campo obligatorio Socio utilizar formato con puntos y guión. Ej. 11.222.333-k';
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
		case "eliminar_carga":
			return '¿Está seguro/a que desea eliminar a esta carga familiar?';
		break;
		case "rango_fecha_edades":
			return 'Edad mínima 0 (no ha cumplido primer año). Edad final debe ser mayor a edad inicial';
		break;									
	}
}