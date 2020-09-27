<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}
		@if ($objeto->deleted_at === null)
			<div class="text-center enlaces-ver">
				<x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="{{ obtenerRutaEditar($titulo) }}" :id="$objeto->id"/>
			</div>				
		@endif

	</p>

	<div class="table-responsive centrar-tabla">
		<table class="table table-striped table-hover table-sm">
			<tbody>
				@foreach (obtenerCabecerasTablas($tabla) as $cabecera => $nombre)
					@include(obtenerContenidoTabla($tabla))
				@endforeach								
			</tbody>
		</table>

		<!-- Tablas adicionales en vista ver objeto -->
		
		@switch($objeto)
		    @case($objeto instanceof App\Prestamo)
		    	@if ($objeto->cuotas)
		    		@include('inc.tablas.prestamos.mostrar_cuotas')
		  		@else
					@include('inc.tablas.prestamos.mostrar_abonos')
		    	@endif		
		    @break							    						        
		@endswitch

	</div>

</div>