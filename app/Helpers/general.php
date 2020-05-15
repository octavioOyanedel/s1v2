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
