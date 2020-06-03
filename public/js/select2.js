$(document).ready(function() {
    $('.select2').select2({
		language: {
			noResults: function() {
				return "No se encontraron resultados.";        
			},
			searching: function() {
				return "Buscando..";
			}
		}
    });
});