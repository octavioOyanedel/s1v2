$(window).on('load',function(){

    var valor = null;
    var campo = '';

    // esconde alert error
    limpiarFormulario();

    // limpia inputs tras cerrar modal
    $('.enlace-modal-nuevo').click(function(){
        limpiarFormulario();
    });

    // Lógica procesamiento de nuevos campos en form
    // simples
    $('#form-nueva-urbe').on('submit',function(event){
        campo = 'urbe';
        procesarFormulario(event, campo);
    });

    $('#form-nueva-sede').on('submit',function(event){
        campo = 'sede';
        procesarFormulario(event, campo);
    });

    $('#form-nuevo-cargo').on('submit',function(event){
        campo = 'cargo';
        procesarFormulario(event, campo);
    });

    $('#form-nueva-ciudadania').on('submit',function(event){
        campo = 'ciudadania';
        procesarFormulario(event, campo);
    });

    // compuestos     

    // funciones
    function procesarFormulario(event, campo){
        // detener ejecución de envío de formulario
        event.preventDefault();
        //event.currentTarget.submit(); // continuar ejecución de form

        // obtener valor de formulario
        valor = obtenerElementoValor(campo).val().trim(); 

        // validación inicial
        if(soloLetras(valor) && existe(valor)){
            ajaxSimple(valor, event, obtenerRuta(campo), campo); 
        }else{
            errorValidacion('Campo no válido, solo letras y espacios en blanco.');
        }
    }

    function obtenerElementoValor(campo){
        switch(campo) {
            case 'urbe':
                return $('#nueva-urbe');
            break;
            case 'sede':
                return $('#nueva-sede');
            break;
            case 'cargo':
                return $('#nuevo-cargo');
            break;
            case 'ciudadania':
                return $('#nueva-ciudadania');
            break;                     
        }        
    }

    function obtenerElementoCarga(campo){
        switch(campo) {
            case 'urbe':
                return $('#urbe_id');
            break;
            case 'sede':
                return $('#sede_id');
            break;
            case 'cargo':
                return $('#cargo_id');
            break;
            case 'ciudadania':
                return $('#ciudadania_id');
            break;                          
        }        
    }

    function obtenerRuta(campo){
        switch(campo) {
            case 'urbe':
                return '/create_urbe';
            break;
            case 'sede':
                return '/create_sede';
            break;
            case 'cargo':
                return '/create_cargo';
            break;
            case 'ciudadania':
                return '/create_ciudadania';
            break;                       
        }        
    }

    function ajaxSimple(valor, event, ruta, campo){

        cabeceraAjax();

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: ruta,
            data: {nombre: valor},
            success: function(respuesta){
                obtenerElementoCarga(campo).append('<option value='+respuesta+' selected>'+valor+'</option>');
                //event.currentTarget.submit();
                $('.modal').modal('hide');

            },
            error: function(respuesta){
                errorValidacion(respuesta.responseJSON.errors.nombre);                              
            }
        }); 
    
    }

    function errorValidacion(mensaje){
        $('.nuevo-campo-input').addClass('is-invalid');
        $('.nueva-label').hide();
        $('.alertas-nuevos').show().text(mensaje);       
    }    

    function limpiarFormulario(){
        $('.nuevo-campo-input').val('');
        $('.alertas-nuevos').hide();
        $('.nuevo-campo-input').removeClass('is-invalid');        
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

    function objetoVacio(objeto) {
        for(var key in objeto) {
            if(objeto.hasOwnProperty(key))
                return false;
        }
        return true;
    }     

});