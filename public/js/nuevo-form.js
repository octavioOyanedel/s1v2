$(window).on('load',function(){

    var valor = null;
    var texto = '';

    // esconde alertas y limpia formulario
    limpiarFormulario();

    // lógica al hacer clic en enlace agregar campo para que aparezca ventana modal
    $('.enlace-modal-nuevo').click(function(){
        // esconde alertas y limpia formulario
        limpiarFormulario();
        // comprobar si se campo compuesto se creó o se carga desde formulario
        switch($(this).attr('title')) {
            case 'Agregar Comuna':
                procesarSeleccionCampo('urbe_seleccionada', 'nueva_comuna', 'texto_urbe_comuna');
            break;
            case 'Agregar Área':
                procesarSeleccionCampo('sede_seleccionada', 'nueva_area', 'texto_sede_area');
            break;                              
        }       
    });

    // Lógica procesamiento de nuevos campos en form
    // simples
    $('#form-nueva-urbe').on('submit',function(event){
        procesarFormulario(event, 'urbe');
    });

    $('#form-nueva-sede').on('submit',function(event){
        procesarFormulario(event, 'sede');
    });

    $('#form-nuevo-cargo').on('submit',function(event){
        procesarFormulario(event, 'cargo');
    });

    $('#form-nueva-ciudadania').on('submit',function(event){
        procesarFormulario(event, 'ciudadania');
    });

    // compuestos    
    $('#form-nueva-comuna').on('submit',function(event){
        procesarFormulario(event, 'comuna');        
    });

    $('#form-nueva-area').on('submit',function(event){
        procesarFormulario(event, 'area');        
    });       

    /************************************************
     * FUNCIONES
     ************************************************/

    function procesarSeleccionCampo(seleccionado, nuevo, texto){ 
        valor = obtenerElementoCarga(seleccionado).val();
        if(valor != ''){
            texto = obtenerElementoCarga(seleccionado).text();
            if(obtenerTextoElemento(texto, valor) === ''){
                obtenerElementoValor(nuevo).append('<option value='+valor+' selected>'+texto+'</option>');
            }else{
                obtenerElementoValor(nuevo).val(valor).find("option[value="+valor+"]").attr('selected', true);
            }                                        
        }
    }

    function procesarFormulario(event, campo){
        // detener ejecución de envío de formulario
        event.preventDefault();
        //event.currentTarget.submit(); // continuar ejecución de form

        // obtener valor de formulario
        valor = obtenerElementoValor(campo).val().trim(); 

        // validación inicial
        if(soloLetras(valor) && existe(valor)){
            switch(campo) {
                case 'comuna':
                    ajaxSimple(valor, event, obtenerRuta(campo), campo, $('#urbe-nueva-comuna option:selected').val());
                    completarOption('urbe', 'urbe_nueva_seleccionada');
                break;  
                case 'area':
                    ajaxSimple(valor, event, obtenerRuta(campo), campo, $('#sede-nueva-area option:selected').val());
                    completarOption('sede', 'sede_nueva_seleccionada');
                break;                  
                default:
                    ajaxSimple(valor, event, obtenerRuta(campo), campo, '');                     
            }   
            

        }else{
            errorValidacion('Campo no válido, solo letras y espacios en blanco.');
        }
    }

    function ajaxSimple(valor, event, ruta, campo, id){

        data = null;

        switch(campo) {
            case 'comuna':
                data = {nombre: valor, urbe_id: id}; 
            break; 
            case 'area':
                data = {nombre: valor, sede_id: id}; 
            break;              
            default:
                data = {nombre: valor};                      
        }  

        cabeceraAjax();
 

        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: ruta,
            data: data,
            success: function(respuesta){
                obtenerElementoCarga(campo).append('<option value='+respuesta+' selected>'+valor+'</option>');
                // event.currentTarget.submit();
                // seleccionar option que corresponde
                $('.modal').modal('hide');
            },
            error: function(respuesta){
                errorValidacion(respuesta.responseJSON.errors.nombre);                              
            }
        });        

    }

    function completarOption(campo, seleccionado){
        obtenerElementoCarga(campo).val(obtenerElementoValor(seleccionado).val()).find("option[value="+obtenerElementoValor(seleccionado).val()+"]").attr('selected', true);
    }

    function obtenerTextoElemento(campo, valor){
        switch(campo) {
            case 'texto_urbe_comuna':
                return $("#urbe-nueva-comuna option[value="+valor+"]").text();
            break;
            case 'texto_sede_area':
                return $("#sede-nueva-area option[value="+valor+"]").text();
            break;                                              
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
            case 'comuna':
                return $('#nueva-comuna');
            break;
            case 'area':
                return $('#nueva-area');
            break;
            case 'nueva_comuna':
                return $('#urbe-nueva-comuna'); 
            break;
            case 'nueva_area':
                return $('#sede-nueva-area'); 
            break;
            case 'urbe_nueva_seleccionada':
                return $('#urbe-nueva-comuna option:selected');
            break;
            case 'sede_nueva_seleccionada':
                return $('#sede-nueva-area option:selected');
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
            case 'comuna':
                return $('#comuna_id');
            break;
            case 'area':
                return $('#area_id');
            break;            
            case 'urbe_seleccionada':
                return $('#urbe_id option:selected');
            break;
            case 'sede_seleccionada':
                return $('#sede_id option:selected');
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
            case 'comuna':
                return '/create_comuna';
            break;
            case 'area':
                return '/create_area';
            break;                                              
        }        
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