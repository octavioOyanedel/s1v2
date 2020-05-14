<?php

/**
 * Descripción: obtener ruta para carga dinámica de ncontenido tabla
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerContenidoTabla($nombre)
{
	switch ($nombre) {
		case "usuarios":
			return 'inc.tablas.usuarios.listar';
		break;
		case "ver_usuario":
			return 'inc.tablas.usuarios.mostrar';
		break;
		case "socios":
			return 'inc.tablas.socios.listar';
		break;
	}
}

/**
 * Descripción: obtener cabeceras y su respectiva clase de aliniamiento
 * Entrada/s: string nombre de tabla
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerCabecerasTablas($nombre)
{
	switch ($nombre) {	
		case "socios":
			return array('Nombre'=>'','Género'=>'','Rut'=>'','Fecha Ingreso Sind1'=>'text-center','N° Socio'=>'','Correo'=>'','Anexo'=>'text-center','N° Contacto'=>'text-center','Sede'=>'','Área'=>'','Cargo'=>'');
		break;
		case "ver_usuario":
			return array('Nombre'=>'nombre1','Correo'=>'email','Privilegio'=>'privilegio_id','Fecha de Creación'=>'created_at','Última Actualización'=>'updated_at' );
		break;	
		case "usuarios":
			return array('Nombre'=>'','Correo'=>'','Privilegio'=>'');
		break;			
	}
}

/**
 * Descripción: formatear valor para ser desplegado en tabla
 * Entrada/s: string valor
 * Salida: string - o valor
 */
function formatearCampoVacioTabla($valor)
{
    if($valor === null || $valor === ''){
        return '-';
    }else{
        return $valor;
    }
}