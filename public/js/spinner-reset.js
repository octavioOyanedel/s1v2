$(window).on('load',function(){
	$('.spinner-border').hide();

	$('#reset').click(function(){
		if(esCorreoValido($('#email').val()) && $('#email').val()){
			$('.spinner-border').fadeIn(1800);
		}else{
			$('.spinner-border').fadeOut(1800);
		}
	});

	function esCorreoValido(correo) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(correo);
	}	
});