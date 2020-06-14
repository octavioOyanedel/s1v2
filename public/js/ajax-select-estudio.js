$(window).on('load',function(){

	/*
	* Ajax para select multiple de 2 y 3 niveles
	*/

	// 1 - Obtener valor seleccionado para nivel académico
	// 2 - Validar valor seleccionado
	// 3 - Si pasa validación llamada a ajax
	$('#grado_id').change(function(){
		console.log($('#grado_id').val());
		ajax($('#establecimiento_id'), 'establecimientos', $('#grado_id option:selected').val(), 0);
	});

	function ajax(elemento, nombre, id_padre, id_padre2){

        data = null;

        switch(nombre) {
            case 'establecimientos':
                data = {grado_id: id_padre}; 
            break;          
            default:
                data = {nombre: valor};                      
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
					if(parseInt(ids[i]) === parseInt(1)){
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
			case 'establecimientos':
				return '/cargar_establecimientos';
			break;
			case 'areas':
				return '/cargar_areas';
			break;
		}
	}
});