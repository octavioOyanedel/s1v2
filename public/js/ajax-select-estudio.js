$(window).on('load',function(){

	// Desabilitar selects
	bloquearSelect($('#establecimiento_id'));
	bloquearSelect($('#titulo_id'));

	// Desbloquear si existe variable old
	if($('#old_establecimiento').val() != ''){
		desbloquearSelect($('#establecimiento_id'));
		// Cargar establecimientos old
		ajax($('#establecimiento_id'), 'establecimientos', $('#grado_id option:selected').val(), 0, $('#old_establecimiento').val()); 
	}

	if($('#old_titulo').val() != ''){
		desbloquearSelect($('#titulo_id'));
		// Cargar titulos old
		ajax($('#titulo_id'), 'titulos', $('#grado_id option:selected').val(), $('#establecimiento_id option:selected').val(), $('#old_titulo').val());
	}

	// Obtener valores de select con evento change
	// Nivel académico (grado) 
	$('#grado_id').change(function(){
		// Ocultar titulado dependiendo de grado
		if($('#grado_id option:selected').val() == 1){
			ocultarFases();
		}else{
			mostrarFases();			
		}
		// Desbloquear establecimiento
		if(comprobarValor($('#grado_id option:selected').val())){
			desbloquearSelect($('#establecimiento_id'));
			ajax($('#establecimiento_id'), 'establecimientos', $('#grado_id option:selected').val(), 0, $('#old_establecimiento').val());
		}else{
			bloquearSelect($('#establecimiento_id'));		
		}
	});

	// Institución (establecimiento)
	$('#establecimiento_id').change(function(){
		// Desbloquear titulos
		if(comprobarValor($('#grado_id option:selected').val()) && comprobarValor($('#establecimiento_id option:selected').val())){
			desbloquearSelect($('#titulo_id'));
			ajax($('#titulo_id'), 'titulos', $('#grado_id option:selected').val(), $('#establecimiento_id option:selected').val(), $('#old_titulo').val());
		}else{
			bloquearSelect($('#titulo_id'));		
		}

	});	

	function ajax(elemento, nombre, grado_id, establecimiento_id, old){

        data = null;

        switch(nombre) {
            case 'establecimientos':
                data = {id: grado_id}; 
            break; 
            case 'titulos':
                data = {id1: grado_id, id2: establecimiento_id}; 
            break;                          
        }  

		cabeceraAjax();

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: obtenerRuta(nombre),
			data: data,
			success: function(respuesta){
				var ids = Object.values(respuesta);
				var nombres = Object.keys(respuesta);
				limpiarSelect(elemento);
				for (var i = 0; i < ids.length; i++) {
					if(parseInt(ids[i]) === parseInt(old)){
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

	function limpiarSelect(elemento){
		elemento.empty();
		elemento.append('<option value="" selected>...</option>');		
	}

	function obtenerRuta(nombre){
		switch(nombre) {
			case 'establecimientos':
				return '/cargar_establecimientos';
			break;
			case 'titulos':
				return '/cargar_titulos';
			break;
		}
	}

	function cabeceraAjax(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}}
		);
	}
	
	function ocultarFases() {
		$('#fase_id option[value="3"]').hide();
		$('#fase_id option[value="5"]').hide();
	}

	function mostrarFases() {
		$('#fase_id option[value="3"]').show();
		$('#fase_id option[value="5"]').show();
	}

	function comprobarValor(valor) {
		if(valor === '' || valor === null || valor === undefined){
			return false;
		}
		return true;
	}

	function bloquearSelect(elemento) {
		elemento.attr('disabled', 'disabled');
	}

	function desbloquearSelect(elemento) {
		elemento.removeAttr('disabled');
	}	

});