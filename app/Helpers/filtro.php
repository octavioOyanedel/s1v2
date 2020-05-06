<?php

use App\User;
use Illuminate\Http\Request;

/**
 * Descripción: obtener nombre y valor de campos para filtro
 * Entrada/s: string nombre de tabla
 * Salida: arreglo asociativo con nombre y ruta
 */
function obtenerCamposParaFiltro($nombre)
{
	switch ($nombre) {
		case "socios":
			return array('1° Nombre'=>'nombre1','2° Nombre'=>'nombre2','Apellido Pat.'=>'apellido1','Apellido Mat.'=>'apellido2','Rut'=>'rut');
		break;
        case "usuarios":
            return array('1° Nombre'=>'nombre1','2° Nombre'=>'nombre2','Apellido Pat.'=>'apellido1','Apellido Mat.'=>'apellido2','Correo'=>'email','Privilegio'=>'privilegio_id');
        break;
        case "prestamos":
            return array('Numero'=>'registro','Cheque'=>'cheque');
        break;  
	}
}

/**
 * Descripción: obtener objeto de modelo para filtrado y posterior muestra de resultados + index
 * Entrada/s: string nombre tabla
 * Salida: objeto modelo
 */
function obtenerObjetoModel($tabla)
{
    switch ($tabla) {
        case 'users':
            return new User;
            break;
        
        default:
            return new Object;
            break;
    }
}

/**
 * Descripción: obtener arreglo asociativo para appends en paginación
 * Entrada/s: variables para filtrado cantidad, columna y orden
 * Salida: arreglo asociativo
 */
function obtenerAppendsArray($cantidad, $columna, $orden)
{
    return array('cantidad' => $cantidad,'columna' => $columna,'orden' => $orden);
}

/**
 * Descripción: obtener cantidades para filtrado
 * Entrada/s: nombre de tabla
 * Salida: arrego con números de filtrado
 */
function obtenerCantidadesFiltro($nombre)
{
	switch ($nombre) {
		case "socios":
			return array(5,10,20,30,50,100);
		break;
        case "usuarios":
            return array(2,5);
        break;
        case "prestamos":
            return array(5,10,20,30,50);
        break;  
	}
}

/**
 * Descripción: obtener valor de cantidad por defecto para filtrado 
 * Entrada/s: request
 * Salida: valor por defecto
 */
function obtenerCantidad(Request $request)
{
    if ($request->cantidad != '' && $request->cantidad != 'Cant.')
    {     
        return $request->cantidad;
    }
    return 10;
}

/**
 * Descripción: obtener valor de columna por defecto para filtrado 
 * Entrada/s: request
 * Salida: valor por defecto
 */
function obtenerColumna(Request $request)
{
    if ($request->columna != '' && $request->columna != 'Columna')
    {     
        return $request->columna;
    }
    return 'created_at';
}

/**
 * Descripción: obtener valor de orden por defecto para filtrado 
 * Entrada/s: request
 * Salida: valor por defecto
 */
function obtenerOrden(Request $request)
{
    if ($request->orden != '' && $request->orden != 'Orden')
    {     
        return $request->orden;
    }
    return 'DESC';
}

/**
 * Descripción: obtener valor de campo por defecto para filtrado 
 * Entrada/s: request
 * Salida: valor por defecto
 */
function obtenerCampo(Request $request)
{
    if ($request->campo != '')
    {    
        return $request->campo;
    }
    return '';
}
