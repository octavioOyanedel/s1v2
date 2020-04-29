<?php

/**
 * Descripción: Obtener valor por defecto input
 * Entrada/s: valor old y value
 * Salida: valor correspondiente
 */
function obtenerValorInput($old, $valor)
{
	if($old != null){
		return $old;
	}else{
		return $valor;
	}
}