<?php

/**
 * Descripción: Obtener texto operacion para registro de log
 * Entrada/s: array original, array opcional (editar), string identificador de operación 
 * Salida: string con key y valor concatenados creados sin valores null
 */
function obtenerTexto($original, $modificado, $identificador) {

    // $original === 0 crear
    // $original != 0 editar
    if(count($original) === 0){
        return textoCrear(filtrarCampos($modificado, $identificador));
    }else{
        return textoEditar(filtrarCampos($original, $identificador),filtrarCampos($modificado, $identificador));      
    }

}

/**
 * Descripción: Obtener texto para log editar
 * Entrada/s: array
 * Salida: array filtrado 
 */
function textoEditar($original, $modificado) {
    $indice = 0;
    $separador = '';
    $texto = '';
    foreach ($modificado as $key => $value) {
        ($indice === 0) ? $separador = '' : $separador = ', ';
        if($original[$key] != $value){
            $texto = $texto.$separador.$key.' de '.formatearValor($original[$key]).' a '.formatearValor($value);   
            $indice++;
        }    
        
    }
    return $texto; 
}

/**
 * Descripción: Obtener texto para log crear
 * Entrada/s: array
 * Salida: array filtrado 
 */
function textoCrear($modificado) {
    $indice = 0;
    $separador = '';
    $texto = '';
    foreach ($modificado as $key => $value) {
        if($indice != 0){
            $separador = ', ';
        }
        $texto = $texto.$separador.$key.' = '.formatearValor($value);            
        $indice++;
    }
    return $texto; 
}

/**
 * Descripción: Formatear valor para registro en log
 * Entrada/s: string valor
 * Salida: string - o valor 
 */
function formatearValor($valor) {
    if($valor === null || $valor === ''){
        return '-';
    }else{
        return $valor;
    }
}

/**
 * Descripción: Obtener arreglo con llaves a eliminar
 * Entrada/s: array
 * Salida: array filtrado 
 */
function filtrarCampos($array, $nombre) {
    $keys = null;
    switch ($nombre) {
        case 'editar_usuario':
            $keys = array('password','email_verified_at','remember_token','created_at','updated_at');
        break;
        case 'crear_usuario':
            $keys = array('password','created_at','updated_at');
        break;      
        case 'eliminar_usuario':
            $keys = array('id','email_verified_at','password','remember_token','created_at','updated_at');
        break;                                 
        case 'crear':
            $keys = array('_token', 'updated_at', 'created_at');
        break;
        case 'crear_prestamo':
            $keys = array('_token', 'updated_at', 'created_at','renta');
        break;                     
            default: 
            $keys = array('created_at','updated_at');                                                   
    }
    foreach ($keys as $key) {
        unset($array[$key]);
    }
    return $array;
}

/**
 * Descripción: Obtener sistema operativo de cliente
 * Entrada/s: 
 * Salida: string sistema operativo cliente
 */
function obtenerSistemaOperativo() {

    $os_platform  = "Sistema operativo desconocido.";
    $os_array = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );
    foreach ($os_array as $regex => $value)
    if (preg_match($regex, $_SERVER['HTTP_USER_AGENT']))
        $os_platform = $value;
    return $os_platform;
}

/**
 * Descripción: Obtener navegador cliente
 * Entrada/s: 
 * Salida: string navegador cliente
 */
function obtenerBrowser() {

    $browser = "Browser desconocido.";
    $browser_array = array(
        '/msie/i'      => 'Internet Explorer',
        '/firefox/i'   => 'Firefox',
        '/safari/i'    => 'Safari',
        '/chrome/i'    => 'Chrome',
        '/edge/i'      => 'Edge',
        '/opera/i'     => 'Opera',
        '/netscape/i'  => 'Netscape',
        '/maxthon/i'   => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i'    => 'Handheld Browser'
    );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $_SERVER['HTTP_USER_AGENT']))
            $browser = $value;
    return $browser;
}

/**
 * Descripción: Obtener dirección ip cliente
 * Entrada/s: 
 * Salida: string ip cliente
 */
function obtenerIp(){

    if ( getenv("HTTP_CLIENT_IP") ) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif ( getenv("HTTP_X_FORWARDED_FOR") ) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if ( strstr($ip, ',') ) {
            $tmp = explode(',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}