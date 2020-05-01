$(window).on('load',function(){
	$('.spinner-border').hide();

	$('#reset-form').on('submit',function(event){
		//detener ejecución de envío de formulario
		event.preventDefault();

		var correo = $('#email').val();

		if(esCorreoValido(correo)){
			$('.spinner-border').fadeIn(1800);
			ajaxCorreos(correo, event);
		}else{
			$('.spinner-border').fadeOut(1800);
		}

	});

	function ajaxCorreos(valor, event){

		cabeceraAjax();

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/correos_reset',
			data: {parametro: valor},
			success: function(respuesta){
				if(respuesta === 'existe'){
					ajaxLog(valor, event);
				}else{
					$('.spinner-border').fadeOut(1800);
					event.currentTarget.submit();
				}
			},
			error: function(respuesta){
				$('.spinner-border').fadeOut(1800);
				event.currentTarget.submit();
			}
		});	
	
	}

	function ajaxLog(valor, event){

		cabeceraAjax();

		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/log_reset',
			data: {parametro: valor},
			success: function(respuesta){
				if(respuesta === 'ok'){
					//reanuda envío de formulario
					event.currentTarget.submit();					
				}
			},
			error: function(respuesta){
				$('.spinner-border').fadeOut(1800);
				event.currentTarget.submit();
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

	function esCorreoValido(correo) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(correo);
	}	

});