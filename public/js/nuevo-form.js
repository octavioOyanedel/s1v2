$(window).on('load',function(){

    var valor = null;

    $('#nueva-ciudad').on('submit',function(event){

        // detener ejecución de envío de formulario
        event.preventDefault();

        // obtener valor de formulario
        valor = $('#nombre-ciudad').val().trim();

        // validación inicial
        if(soloLetras(valor) && existe(valor)){
            ajaxSimple(valor, event, '/create_urbe')
        }else{
            alert('error');
        }
        

    });

    function ajaxSimple(valor, event, ruta){

        cabeceraAjax();

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: ruta,
            data: {nombre: valor},
            success: function(respuesta){
                if(respuesta === 'ok'){
                    //reanuda envío de formulario
                    alert('si');
                    //event.currentTarget.submit();                   
                }
            },
            error: function(respuesta){
                alert(respuesta);
                //event.currentTarget.submit();
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

    function soloLetras(nombre){
        var regEx = /^[A-Z a-z]+$/;
        if(nombre.match(regEx)){
            return true;
        }else{
            return false;
        }
    }    

    function existe(nombre){
        if(nombre != undefined && nombre != null && nombre != ''){
            return true;
        }else{
            return false;
        }
    }       

});