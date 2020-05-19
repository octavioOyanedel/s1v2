<?php

/**
 * Descripción: obtener id de formulario
 * Entrada/s: string nombre de label
 * Salida: string id
 */
function obtenerIdFormulario($label)
{
	switch ($label) {
		case "Ciudad":
			return 'form-nueva-urbe';
		break;
		case "Sede":
			return 'form-nueva-sede';
		break;
		case "Cargo":
			return 'form-nuevo-cargo';
		break;
		case "Nacionalidad":
			return 'form-nueva-ciudadania';
		break;
		case "Comuna":
			return 'form-nueva-comuna';
		break;
		case "Área":
			return 'form-nueva-area';
		break;				
	}
}

/**
 * Descripción: obtener ruta de formulario
 * Entrada/s: string nombre de label
 * Salida: string con ruta de formulario
 */
function obtenerRutaFormulario($label)
{
	switch ($label) {
		case "Ciudad":
			return 'inc.forms.socio.modal.nueva_urbe';
		break;
		case "Sede":
			return 'inc.forms.socio.modal.nueva_sede';
		break;
		case "Cargo":
			return 'inc.forms.socio.modal.nuevo-cargo';
		break;
		case "Nacionalidad":
			return 'inc.forms.socio.modal.nueva-ciudadania';
		break;
		case "Comuna":
			return 'inc.forms.socio.modal.nueva-comuna';
		break;
		case "Área":
			return 'inc.forms.socio.modal.nueva-area';
		break;		
	}
}