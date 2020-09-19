$(window).on('load',function(){

    /******************** Bloque formulario préstamos ***************************/
    
    // Método => 1 descuento por planilla, 2 depósito
  
    // Verificación por si existe valor old
    if($('#metodo_id option:selected').val() == 1){
        limpiarInput($('#fecha_pago'));    
        deshabilitar($('#fecha_pago'));        
        habilitar($('#cuotas'));
    }

    if($('#metodo_id option:selected').val() == 2){
        deshabilitar($('#cuotas'));
        limpiarSelect($('#cuotas'));
        habilitar($('#fecha_pago'));   
    }

    // Carga normal
     $('#metodo_id').change(function(){
        // Ocultar fecha de pago o cuotas según método de pago
        // 1 Descuento por planilla
        // 2 Depósito
        if($('#metodo_id option:selected').val() == 1){
            deshabilitar($('#fecha_pago'));
            limpiarInput($('#fecha_pago'));            
            habilitar($('#cuotas'));
        }

        if($('#metodo_id option:selected').val() == 2){
            deshabilitar($('#cuotas'));
            limpiarSelect($('#cuotas'));
            habilitar($('#fecha_pago'));
        }
    });  


    /******************** Funciones generales ***************************/

    function deshabilitar(elemento){
        elemento.attr('disabled', 'disabled');
    }

    function habilitar(elemento){
        elemento.removeAttr("disabled");
    }   

    function limpiarInput(elemento){
        elemento.val('');   
    }

    function limpiarSelect(elemento){
        elemento.prop('selectedIndex',0);
    }

});