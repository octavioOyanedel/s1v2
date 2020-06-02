<?php

/**
 * Descripción: formatear fecha 
 * Entrada/s: string fecha
 * Salida: string fecha formateada yyyy-mm-dd o dd-mm-yyyy
 */
function formatoFecha($fecha)
{
    if($fecha != null && $fecha != ''){
        $bloque = explode('-', $fecha);
        return $nuevaFecha = $bloque[2] . '-' . $bloque[1] . '-' . $bloque[0];
    }else{
        return null;
    }

}

/**
 * Descripción: cambiar formato fecha y hora
 * Entrada/s: string fecha hora
 * Salida: string fecha formateada yyyy-mm-dd hh:mm:ss o dd-mm-yyyy hh:mm:ss
 */
function formatoFechaHora($fecha)
{
    if($fecha != null && $fecha != ''){
		$date = substr($fecha,0,10);
		$hora = substr($fecha,11,8);
		$date = formatoFecha($date);
		return $date.' '.$hora;
    }else{
        return null;
    }

}

/**
 * Descripción: es formato fecha
 * Entrada/s: string fecha
 * Salida: boolean
 */
function esFormatoFecha($fecha)
{
	return preg_match('/^[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}$/', $fecha);
}

/**
 * Descripción: obtener arreglo con nombre y apellido candidato para busqueda
 * Entrada/s: string búsqueda
 * Salida: arreglo con nombre y apellido
 */
function separarNombreApellido($q)
{
	$arreglo = array('nombre'=>'','apellido'=>'');
	if($q != ''){
		$aux = explode(' ', $q);
		$arreglo['nombre'] = $aux[0];
		if(count($aux) > 1){
			unset($aux[0]);
			$arreglo['apellido'] = implode(' ',$aux);			
		}
	}
	return $arreglo;

}
