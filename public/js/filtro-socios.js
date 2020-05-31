$(window).on('load',function(){
    $('#tipo_categoria').change(function(){       
        if($('#tipo_categoria option:selected').val() != 'solo_activos'){
            $("#categoria_id").prop('disabled', false);
            $("#fecha_desv_ini").prop('disabled', false);
            $("#fecha_desv_fin").prop('disabled', false);
        }else{
            $("#categoria_id").prop('disabled', true);
            $("#fecha_desv_ini").prop('disabled', true);
            $("#fecha_desv_fin").prop('disabled', true);
        }
    });	
});