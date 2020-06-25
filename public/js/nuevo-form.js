$(window).on('load',function(){
   
    // 1- limpiar formulario modal
    limpiarFormularioModal();

    // 2- lógica que agrega o no valor obtenido de form incorporar en form de ventana modal
    // solo comuna
    $('.enlace-modal-nuevo').click(function(){
        limpiarFormularioModal();
        completarSelectModal($(this).attr('title'));
    });

    // 5- procesamiento form de ventana modal
    $('#form-nueva-urbe').on('submit',function(event){
        procesarFormulario(event, 'urbe');
    });

    $('#form-nueva-comuna').on('submit',function(event){
        procesarFormulario(event, 'comuna');        
    });

    $('#form-nueva-sede').on('submit',function(event){
        procesarFormulario(event, 'sede');
    });

    $('#form-nueva-area').on('submit',function(event){
        procesarFormulario(event, 'area');        
    });

    $('#form-nuevo-cargo').on('submit',function(event){
        procesarFormulario(event, 'cargo');
    });

    $('#form-nueva-ciudadania').on('submit',function(event){
        procesarFormulario(event, 'ciudadania');
    });

    $('#form-nuevo-parentesco').on('submit',function(event){
        procesarFormulario(event, 'parentesco');
    });    

    $('#form-nuevo-nivel').on('submit',function(event){
        procesarFormulario(event, 'nivel');
    });

    $('#form-nuevo-estado').on('submit',function(event){
        procesarFormulario(event, 'estado');
    }); 

    $('#form-nuevo-establecimiento').on('submit',function(event){
        procesarFormulario(event, 'establecimiento');
    });   

    $('#form-nuevo-titulo').on('submit',function(event){
        procesarFormulario(event, 'titulo');
    });   

    /************************************************
     * FUNCIONES
     ************************************************/ 

    // 6- procesamiento de formulario
    function procesarFormulario(event, nombre){
        // detener ejecución de envío de formulario
        event.preventDefault();
        //event.currentTarget.submit(); // continuar ejecución de form

        // obtener valor de formulario
        var valor = obtenerValorInputModal(nombre); 

        // validación inicial
        if(soloLetras(valor) && existe(valor)){
            $('.spinner-border').fadeIn(1800);
            switch(nombre) {
                case 'comuna':                    
                    ajaxSimple(valor, event, obtenerRuta(nombre), nombre, obtenerValorSelectModal('urbe_modal'));
                    seleccionarOptionEnSelected('urbe_form', obtenerValorSeleccionado('urbe_modal'));
                break;  
                case 'area':
                    ajaxSimple(valor, event, obtenerRuta(nombre), nombre, obtenerValorSelectModal('sede_modal'));
                    seleccionarOptionEnSelected('sede_form', obtenerValorSeleccionado('sede_modal'));
                break;  
                case 'establecimiento':
                    ajaxSimple(valor, event, obtenerRuta(nombre), nombre, obtenerValorSelectModal('grado_modal'));
                    seleccionarOptionEnSelected('grado_form', obtenerValorSeleccionado('grado_modal'));
                break;     
                case 'titulo':
                    ajaxSimple(valor, event, obtenerRuta(nombre), nombre, obtenerValorSelectModal('titulo_modal'));
                    seleccionarOptionEnSelected('titulo_form', obtenerValorSeleccionado('titulo_modal'));
                break;                                                     
                default:
                    ajaxSimple(valor, event, obtenerRuta(nombre), nombre, '');                     
            }   
            

        }else{
            errorValidacion('Campo no válido, solo letras y espacios en blanco.');
        }
    }

    // 7. ajax
    function ajaxSimple(valor, event, ruta, nombre, id){

        data = null;

        switch(nombre) {
            case 'comuna':
                data = {nombre: valor, urbe_id: id}; 
            break; 
            case 'area':
                data = {nombre: valor, sede_id: id}; 
            break;
            case 'establecimiento':
                data = {nombre: valor, grado_id: id}; 
            break;       
            case 'titulo':
                data = {nombre: valor, grado_id: id}; 
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
                obtenerSelectFormIncorporar(nombre).append('<option value='+respuesta+' selected>'+valor+'</option>');
                // event.currentTarget.submit();
                $('.spinner-border').hide();
                $('.modal').modal('hide');
            },
            error: function(respuesta){
                errorValidacion(respuesta.responseJSON.errors.nombre);                              
            }
        });        

    }    

    // 3- validar para agregar valor a select
    function completarSelectModal(titulo){
        switch(titulo) {
            case 'Agregar Comuna':
                agregarOptionSeleccionada('urbe_form', 'urbe_modal');
            break;   
            case 'Agregar Área':
                agregarOptionSeleccionada('sede_form', 'sede_modal');
            break;   
            case 'Agregar Institución':
                agregarOptionSeleccionada('grado_form', 'grado_modal');
            break;   
            case 'Agregar Título':
                agregarOptionSeleccionada('titulo_form', 'titulo_modal');
            break;                                                                
        }             
    }  
    // 4- antes de añadir validar si existe en select modal
    function agregarOptionSeleccionada(nombre_form, nombre_modal){
        if(obtenerValorSeleccionado(nombre_form) != ''){
            // comprobar si fue creado: no esta en select
            if(buscarValorEnSelect(nombre_modal, obtenerValorSeleccionado(nombre_form)) != undefined && buscarValorEnSelect(nombre_modal, obtenerValorSeleccionado(nombre_form)) != ''){
                // existe entonces seleccionar option que corresponda
                seleccionarOptionEnSelected(nombre_modal, obtenerValorSeleccionado(nombre_form));
            }else{
                // insertar valor y texto a select
                obtenerSelectModal(nombre_modal).append('<option value='+obtenerValorSeleccionado(nombre_form)+' selected>'+obtenerTextoSeleccionado(nombre_form)+'</option>');  
            }
        }
    }

    function obtenerRuta(nombre){
        switch(nombre) {
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
            case 'parentesco':
                return '/create_parentesco';
            break;
            case 'nivel':
                return '/create_grado';
            break;     
            case 'estado':
                return '/create_fase';
            break;  
            case 'establecimiento':
                return '/create_institucion';
            break;   
            case 'titulo':
                return '/create_titulo';
            break;                                                                                  
        }        
    }

    function obtenerValorSeleccionado(nombre){
        switch(nombre) {
            case 'urbe_form':
                return $('#urbe_id option:selected').val();
            break;
            case 'urbe_modal':
                return $('#urbe-nueva-comuna option:selected').val();
            break;
            case 'sede_form':
                return $('#sede_id option:selected').val();
            break;
            case 'sede_modal':
                return $('#sede-nueva-area option:selected').val();
            break;
            case 'grado_form':
                return $('#grado_id option:selected').val();
            break;
            case 'grado_modal':
                return $('#grado-nuevo-establecimiento option:selected').val();
            break;   
            case 'titulo_form':
                return $('#grado_id option:selected').val();
            break;
            case 'titulo_modal':
                return $('#grado-nuevo-titulo option:selected').val();
            break;                                              
        }            
    }

    function buscarValorEnSelect(nombre, valor){
        switch(nombre) {
            case 'urbe_modal':
                return $('#urbe-nueva-comuna option[value='+valor+']').val();
            break;  
            case 'sede_modal':
                return $('#sede-nueva-area option[value='+valor+']').val();
            break;  
            case 'grado_modal':
                return $('#grado-nuevo-establecimiento option[value='+valor+']').val();
            break; 
            case 'titulo_modal':
                return $('#grado-nuevo-titulo option[value='+valor+']').val();
            break;                     
        }            
    }

    function seleccionarOptionEnSelected(nombre, valor){
        switch(nombre) {
            case 'urbe_modal':
                return $('#urbe-nueva-comuna option[value='+valor+']').attr('selected', true);
            break;    
            case 'urbe_form':
                return $('#urbe_id option[value='+valor+']').attr('selected', true);
            break;
            case 'sede_modal':
                return $('#sede-nueva-area option[value='+valor+']').attr('selected', true);
            break;    
            case 'sede_form':
                return $('#sede_id option[value='+valor+']').attr('selected', true);
            break;    
            case 'grado_modal':
                return $('#grado-nuevo-establecimiento option[value='+valor+']').attr('selected', true);
            break;    
            case 'grado_form':
                return $('#grado_id option[value='+valor+']').attr('selected', true);
            break;   
            case 'titulo_modal':
                return $('#grado-nuevo-titulo option[value='+valor+']').attr('selected', true);
            break;    
            case 'titulo_form':
                return $('#grado_id option[value='+valor+']').attr('selected', true);
            break;                                                 
        }            
    }    

    function obtenerTextoSeleccionado(nombre){
        switch(nombre) {
            case 'urbe_form':
                return $('#urbe_id option:selected').text();
            break;
            case 'sede_form':
                return $('#sede_id option:selected').text();
            break;  
            case 'grado_form':
                return $('#grado_id option:selected').text();
            break;   
            case 'titulo_form':
                return $('#grado_id option:selected').text();
            break;                       
        }            
    }

    function obtenerSelectFormIncorporar(nombre){
        switch(nombre) {
            case 'urbe':
                return $('#urbe_id');
            break;
            case 'comuna':
                return $('#comuna_id');
            break;
            case 'sede':
                return $('#sede_id');
            break;
            case 'area':
                return $('#area_id');
            break;
            case 'cargo':
                return $('#cargo_id');
            break;
            case 'ciudadania':
                return $('#ciudadania_id');
            break;
            case 'parentesco':
                return $('#parentesco_id');
            break;
            case 'nivel':
                return $('#grado_id');
            break; 
            case 'estado':
                return $('#fase_id');
            break;   
            case 'establecimiento':
                return $('#establecimiento_id');
            break;    
            case 'titulo':
                return $('#titulo_id');
            break;                                                                                                                       
        }    
    }

    function obtenerSelectModal(nombre){
        switch(nombre) {
            case 'urbe_modal':
                return $('#urbe-nueva-comuna');
            break;
            case 'sede_modal':
                return $('#sede-nueva-area');
            break; 
            case 'grado_modal':
                return $('#grado-nuevo-establecimiento');
            break;      
            case 'titulo_modal':
                return $('#grado-nuevo-titulo');
            break;                                                                 
        }   
    }

    function obtenerValorSelectModal(nombre){
        switch(nombre) {
            case 'urbe_modal':
                return $('#urbe-nueva-comuna option:selected').val();
            break;
            case 'sede_modal':
                return $('#sede-nueva-area option:selected').val();
            break;    
            case 'grado_modal':
                return $('#grado-nuevo-establecimiento option:selected').val();
            break;        
            case 'titulo_modal':
                return $('#grado-nuevo-titulo option:selected').val();
            break;                                                                             
        }   
    }    

    function obtenerInputModal(nombre){
        switch(nombre) {
            case 'urbe':
                return $('#nueva-urbe');
            break;
            case 'comuna':
                return $('#nueva-comuna');
            break;
            case 'sede':
                return $('#nueva-sede');
            break;
            case 'area':
                return $('#nueva-area');
            break;
            case 'cargo':
                return $('#nuevo-cargo');
            break;
            case 'ciudadania':
                return $('#nueva-ciudadania');
            break;
            case 'parentesco':
                return $('#nuevo-parentesco');
            break;
            case 'nivel':
                return $('#nuevo-nivel');
            break;    
            case 'estado':
                return $('#nueva-fase');
            break;   
            case 'establecimiento':
                return $('#nuevo-establecimiento');
            break;
            case 'titulo':
                return $('#nuevo-titulo');
            break;                                                                                                                     
        }   
    }

    function obtenerValorInputModal(nombre){
        switch(nombre) {
            case 'urbe':
                return $('#nueva-urbe').val().trim();
            break;
            case 'comuna':
                return $('#nueva-comuna').val().trim();
            break;
            case 'sede':
                return $('#nueva-sede').val().trim();
            break;
            case 'area':
                return $('#nueva-area').val().trim();
            break;
            case 'cargo':
                return $('#nuevo-cargo').val().trim();
            break;
            case 'ciudadania':
                return $('#nueva-ciudadania').val().trim();
            break;   
            case 'parentesco':
                return $('#nuevo-parentesco').val().trim();
            break;
            case 'nivel':
                return $('#nuevo-nivel').val().trim();
            break;         
            case 'estado':
                return $('#nueva-fase').val().trim();
            break; 
            case 'establecimiento':
                return $('#nuevo-establecimiento').val().trim();
            break;
            case 'titulo':
                return $('#nuevo-titulo').val().trim();
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

    function soloLetras(nombre){
        var regEx = /^[A-Z a-zÑÁÉÍÓÚñáéíóúü]+$/;
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

    function errorValidacion(mensaje){
        $('.nuevo-campo-input').addClass('is-invalid');
        $('.nueva-label').hide();
        $('.alertas-nuevos').show().text(mensaje);
        $('.spinner-border').hide();       
    }    

    function limpiarFormularioModal(){
        $('.nuevo-campo-input').val('');
        $('.alertas-nuevos').hide();
        $('.nuevo-campo-input').removeClass('is-invalid');
        $('.spinner-border').hide();        
    }   

});