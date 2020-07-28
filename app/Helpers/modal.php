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
		case "Parentesco":
			return 'form-nuevo-parentesco';
		break;
		case "Nivel":
			return 'form-nuevo-nivel';
		break;
		case "Estado":
			return 'form-nuevo-estado';
		break;	
		case "Institución":
			return 'form-nuevo-establecimiento';
		break;
		case "Título":
			return 'form-nuevo-titulo';
		break;
		case "Interés":
			return 'form-nuevo-interes';
		break;	
		case "Cuenta":
			return 'form-nueva-cuenta';
		break;															
	}
}

