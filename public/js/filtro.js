$(window).on('load',function(){

    if(obtenerValorDesdeURL('cantidad') != null){
        $('#cantidad option:selected').removeAttr('selected');
        $('#cantidad option[value="'+obtenerValorDesdeURL('cantidad')+'"]').attr("selected","selected");
    }

    if(obtenerValorDesdeURL('columna') != null){
        $('#columna option:selected').removeAttr('selected');
        $('#columna option[value="'+obtenerValorDesdeURL('columna')+'"]').attr("selected","selected");
    }

    if(obtenerValorDesdeURL('orden') != null){
        $('#orden option:selected').removeAttr('selected');
        $('#orden option[value="'+obtenerValorDesdeURL('orden')+'"]').attr("selected","selected");
    }

    function obtenerValorDesdeURL(parametro){
        var results = new RegExp('[\?&]' +parametro+ '=([^&#]*)').exec(window.location.href);
        if(results != null){
            return results[1];
        }
        return null;
    }
});