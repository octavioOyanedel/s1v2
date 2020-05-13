<?php

/**
 * Descripción: Obtener texto operacion para registro de log
 * Entrada/s: array original, array opcional (editar), string identificador de operación 
 * Salida: string con key y valor concatenados creados sin valores null
 */
function obtenerTexto($array, $opcional, $identificador) {

    // $opcional === 0 crear
    // $opcional != 0 editar
    if(count($opcional) === 0){
        return concatenarTexto(quitarNull(filtrarCampos($array, $identificador)), array());
    }else{
        $keys = obtenerKeysEditar($array, $opcional, $identificador)
        return concatenarTexto($filtrado, );
    }
}

/**
 * Descripción: Obtener llave y valor de array (Objeto) modificados por usuario
 * Entrada/s: arrays original y modificado desde formulario
 * Salida: array con key y valor modificados
 */
function obtenerKeysEditar($array, $opcional, $identificador) {
    $original = filtrarCampos($array, $identificador);
    $formulario = filtrarCampos($opcional, $identificador);
    $keys = array();
    foreach ($formulario as $key => $value) {
        if($value != $original[$key]){
            array_push($keys, $key=>$value);
        }
    }
    return $keys;
}

/**
 * Descripción: Obtener texto para log editar
 * Entrada/s: array
 * Salida: array filtrado 
 */
function concatenarTexto($array_filtrado, $keys) {
    $indice = 0;
    $separador = '';
    $texto = '';
    foreach ($array_filtrado as $key => $value) {
        if($indice != 0){
            $separador = ', ';
        }
        // $opcional === 0 crear
        // $opcional != 0 editar
        if(count($keys) != 0){
            $texto = $texto.$separador.$keys[$indice].' de '.$key.' a '.$value;
        }else{
            $texto = $texto.$separador.$key.' = '.$value;            
        }
        $indice++;
    }
    return $texto; 
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
            $keys = array('password','remember_token','created_at','updated_at');
            break;
        case 'crear_usuario':
            $keys = array('password','created_at','updated_at');
            break;      
        case 'eliminar_usuario':
            $keys = array('id','email_verified_at','password','remember_token','created_at','updated_at');
            break;  
        case 'crear_socio':
            $keys = array('_token');
            break;                                
    }
    foreach ($keys as $key) {
        unset($array[$key]);
    }
    return $array;
}

/**
 * Descripción: Quitar elementos que posean valores null
 * Entrada/s: array
 * Salida: array filtrado 
 */
function quitarNull($array) {
    foreach ($array as $key => $value) {
        if($value === null){
            unset($array[$key]);
        }
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