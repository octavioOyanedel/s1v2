<?php

use App\Socio;
use App\Prestamo;

/**
 * Descripción: Obtener ruta para completar csrf según formulario
 * Entrada/s: string con nombre de método de formularios
 * Salida: string con ruta de include con csrf
 */
function obtenerCsrf($nombre)
{
	switch ($nombre) {
	    case "put":
	        return 'inc.csrf.put';
	        break;
	    case "delete":
	        return 'inc.csrf.delete';
	        break;      
	    default:
	        return 'inc.csrf.post';
	}
}

/**
 * Descripción: Obtener ruta con contenido de formulario
 * Entrada/s: string con nombre de formulario
 * Salida: string con nombre de ruta
 */
function cargarFormulario($action)
{
	switch ($action) {
	    case "login":
	        return 'inc.forms.auth.login';
	        break;
	    case "password.email":
	        return 'inc.forms.auth.reset';
	        break;
	    case "password.update":
	        return 'inc.forms.auth.reset_ok';
	        break;
	    case "usuarios.update":
	        return 'inc.forms.usuario.editar';
	        break;
	    case "editar_passwd":
	        return 'inc.forms.usuario.pass';
	        break;
	    case "usuarios.store":
	        return 'inc.forms.usuario.crear';
	        break;	
	    case "socios.store":
	        return 'inc.forms.socio.incorporar';
	        break;
        case "socios.update":
            return 'inc.forms.socio.editar';
            break;
        case "filtrar_socios":
            return 'inc.forms.socio.filtrar';
            break;
        case "cargas.store":
            return 'inc.forms.carga.agregar';
            break;
        case "cargas.update":
            return 'inc.forms.carga.editar';
            break;
        case "filtrar_cargas":
            return 'inc.forms.carga.filtrar';
            break; 
        case "estudios.store":
            return 'inc.forms.estudio.agregar';
            break;   
        case "estudios.update":
            return 'inc.forms.estudio.editar';
            break;                                       	                        	                	        	             	        	
        case "prestamos.store":
            return 'inc.forms.prestamo.solicitar';
            break;                                              
	}
}

/**
 * Descripción: Obtener colección para poblar select
 * Entrada/s: array asociativo de colecciones
 * Salida: coleccion Collection
 */
function obtenerColeccion($colecciones, $nombre)
{
	if($colecciones != null){
		return $colecciones[$nombre];
	}	
}

/**
 * Descripción: Obtener objetos
 * Entrada/s: array asociativo de objetos
 * Salida: objeto
 */
function obtenerObjeto($objetos, $nombre)
{
	if($objetos != null){
		return $objetos[$nombre];
	}
}

/**
 * Descripción: Obtener nombre de campo para mostrar registro
 * Entrada/s: String nombre 
 * Salida: comentario
 */
function obtenerNombreObjeto($objeto, $nombre)
{
	switch ($nombre) {
	    case "banca_id":
	        return $objeto->numero;
	        break;
        case "cuenta_id":
            return $objeto->tipo.' N° '.$objeto->numero.' '.$objeto->banco;
            break;
        case "renta_id":
            return $objeto->cantidad.'%';
            break;                                   
	    default:
	        return $objeto->nombre;	        	        	                               
	}
}

/**
 * Descripción: Otorga dinámicamente di option lleva atributo selected 
 * Entrada/s: string campo old
 * Salida: string selected o string vacío
 */
function estaSelected($id, $idObjeto)
{

	if($id != '' && $id != null && $idObjeto != '' && $idObjeto != null){
		if(intval($id) === intval($idObjeto)){
			return 'selected';
		}
	}
	return '';
}

/**
 * Descripción: Obtener id desde parametro requestUri de request
 * Entrada/s: string requestUri
 * Salida: int id
 */
function obtenerIdDesdeRequestUri($ruta)
{
	return intval(substr(strrchr($ruta,"/"),1));
}

/**
 * Descripción: Obtener recomendación de número de socio
 * Entrada/s: 
 * Salida: int número de socio
 */
function ultimoNumeroSocio()
{
    return Socio::all()->last()->numero + 1;
}

/**
 * Descripción: Obtener recomendación de número de préstamo
 * Entrada/s: 
 * Salida: int número de pestamo
 */
function ultimoNumeroPrestamo()
{
    if(Prestamo::all()->last() != null){
        return Prestamo::all()->last()->numero + 1;
    }else{
        return 0;
    }
}

/**
 * Descripción: Obtener rut formateado
 * Entrada/s: string rut 11222333k
 * Salida: string rut formateado 11.222.333-k
 */
function formatoRut($valor)
{
    $rut = $valor;
    $largo = strlen($rut);
    $largoFinal = 0;
    $arrayRutFormato = array();
    $rutFinal = "";
    //obtener largo total para poblar nuevo array
    if ($largo == 9) {
        //si largo es 9 nuevo largo sera de 11 0-11 = 12
        $largoFinal = 12;
    } else {
        //si largo es 9 nuevo largo sera de 10 0-10 = 11
        $largoFinal = 11;
    }
    //formato inicial de array
    for ($i = 0; $i < $largoFinal; $i++) {
        if ($i == $largoFinal - 2) {
            array_push($arrayRutFormato, "-");
        } else {
            array_push($arrayRutFormato, ".");
        }
    }
    //convertir rut en array
    $arrayRut = str_split($rut);
    //recorrer array para construir nuevo array
    for ($i = 0; $i < $largoFinal; $i++) {
        if ($largo == 9) {
            if ($i >= 0 && $i <= 1) {
                $arrayRutFormato[$i] = $arrayRut[$i];
            }
            if ($i >= 3 && $i <= 5) {
                $arrayRutFormato[$i] = $arrayRut[$i - 1];
            }
            if ($i >= 7 && $i <= 9) {
                $arrayRutFormato[$i] = $arrayRut[$i - 2];
            }
            if ($i == 11) {
                $arrayRutFormato[$i] = $arrayRut[$i - 3];
            }
        } else {
            if ($i == 0) {
                $arrayRutFormato[$i] = $arrayRut[$i];
            }
            if ($i >= 2 && $i <= 4) {
                $arrayRutFormato[$i] = $arrayRut[$i - 1];
            }
            if ($i >= 6 && $i <= 8) {
                $arrayRutFormato[$i] = $arrayRut[$i - 2];
            }
            if ($i == 10) {
                $arrayRutFormato[$i] = $arrayRut[$i - 3];
            }
        }
    }
    //convertir array en string
    $rutFinal = implode("", $arrayRutFormato);
    $valor = $rutFinal;
    return $valor;
}