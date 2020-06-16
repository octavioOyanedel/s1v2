$(window).on('load',function(){

	/*
	 * Ajax para select multiple de 2 niveles
	 */

	// 1 - Agregar comprobación de valor old y llamar a petición AJAX
	// enviar:  elemento donde se cargaran options
	// 			nombre para elección de ruta
	// 			valor old de select hijo
	if(comprobarValor($('#old_comuna').val())){
		ajax($('#comuna_id'), 'comunas', $('#urbe_id option:selected').val(), $('#old_comuna').val());
	}

	if(comprobarValor($('#old_area').val())){
		ajax($('#area_id'), 'areas', $('#sede_id option:selected').val(), $('#old_area').val());
	}

	// 2 - Agregar comprobación de valor editar y llamar a petición AJAX
	// enviar:  elemento donde se cargaran options
	// 			nombre para elección de ruta
	// 			valor old de select hijo
	if(comprobarValor($('#editar_comuna').val())){
		ajax($('#comuna_id'), 'comunas', $('#urbe_id option:selected').val(), $('#editar_comuna').val());
	}

	if(comprobarValor($('#editar_area').val())){
		ajax($('#area_id'), 'areas', $('#sede_id option:selected').val(), $('#editar_area').val());
	}

	// 3 - llamada a ajax mientras ocurra evento change en select padres
	// enviar:  elemento donde se cargaran options
	// 			nombre para elección de ruta
	// 			valor old de select hijo
	$('#urbe_id').change(function(){
		ajax($('#comuna_id'), 'comunas', $('#urbe_id option:selected').val(), 0);
	});

	$('#sede_id').change(function(){
		ajax($('#area_id'), 'areas', $('#sede_id option:selected').val(), 0);
	});

	function ajax(elemento, nombre, id_padre, id_hijo){

		cabeceraAjax();

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: obtenerRuta(nombre),
			data: {id: id_padre},
			success: function(respuesta){
				var ids = Object.values(respuesta);
				var nombres = Object.keys(respuesta);
				limpiarSelect(elemento);
				for (var i = 0; i < ids.length; i++) {
					if(parseInt(ids[i]) === parseInt(id_hijo)){
						elemento.append('<option value='+ids[i]+' selected>'+nombres[i]+'</option>');
					}else{
						elemento.append('<option value='+ids[i]+'>'+nombres[i]+'</option>');
					}
				}
			},
			error: function(respuesta){
				console.log('error');
			}
		});		
	}

	function cabeceraAjax(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);
	}

	function comprobarValor(valor) {
		if(valor === '' || valor === null || valor === undefined){
			return false;
		}
		return true;
	}

	function limpiarSelect(elemento){
		elemento.empty();
		elemento.append('<option value="" selected>...</option>');		
	}

	function obtenerRuta(nombre){
		switch(nombre) {
			case 'comunas':
				return '/cargar_comunas';
			break;
			case 'areas':
				return '/cargar_areas';
			break;
		}
	}

});