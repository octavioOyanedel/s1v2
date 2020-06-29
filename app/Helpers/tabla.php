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
		case "ver_socio":
			return 'inc.tablas.socios.mostrar';
		break;
		case "ver_carga":
			return 'inc.tablas.cargas.mostrar';
		break;
		case "cargas":
			return 'inc.tablas.cargas.listar';
		break;	
		case "estudios":
			return 'inc.tablas.estudios.listar';
		break;	
		case "ver_estudio":
			return 'inc.tablas.estudios.mostrar';
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
		case "ver_socio":
			return array('Nombre'=>'nombre1','Rut'=>'rut','Género'=>'genero','Fecha de Nacimiento'=>'fecha_nac','N° Contacto'=>'celular','Correo'=>'correo','Ciudad'=>'urbe_id','Comuna'=>'comuna_id','Dirección'=>'direccion','Fecha Ingreso PUCV'=>'fecha_pucv','Sede'=>'sede_id','Área'=>'area_id','Cargo'=>'cargo_id','Anexo'=>'anexo','Fecha Ingreso Sind1'=>'fecha_sind1','N° Socio'=>'numero','Estado Socio'=>'categoria_id','Nacionalidad'=>'ciudadania_id','Fecha de Creación'=>'created_at','Última Actualización'=>'updated_at','Fecha de Desvinculación'=>'deleted_at');
		break;
		case "cargas":
			return array('Nombre Carga'=>'','Rut'=>'','Fecha de Nacimiento'=>'text-center','Parentesco'=>'');
		break;		
		case "ver_carga":
			return array('Socio'=>'socio_id','Nombre'=>'nombre1','Rut'=>'rut','Fecha de Nacimiento'=>'fecha_nac','Parentesco'=>'parentesco_id','Fecha de Creación'=>'created_at','Última Actualización'=>'updated_at',);
		break;	
		case "estudios":
			return array('Nivel Académico'=>'','Institución'=>'','Estado Estudio'=>'','Título'=>'');
		break;	
		case "ver_estudio":
			return array('Socio'=>'socio_id','Nivel Académico'=>'grado_id','Institución'=>'establecimiento_id','Estado Estudio'=>'fase_id','Título'=>'titulo_id','Fecha de Creación'=>'created_at','Última Actualización'=>'updated_at');
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

/**
 * Descripción: obtener ruta para carga dinámica de ncontenido tabla
 * Entrada/s: string nombre de enlace
 * Salida: arreglo asociativo con nombre y clase
 */
function obtenerRutaEditar($nombre)
{
	switch ($nombre) {
		case "Datos de Socio":
			return 'socios.edit';
		break;
		case "Datos de Usuario":
			return 'usuarios.edit';
		break;
		case "Datos de Carga Familiar":
			return 'cargas.edit';
		break;				
		case "Datos de Estudio Realizado":
			return 'estudios.edit';
		break;	
	}
}