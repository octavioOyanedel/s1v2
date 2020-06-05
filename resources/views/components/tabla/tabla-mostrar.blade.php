<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}
		@if ($objeto->deleted_at === null)
			<div class="text-center enlaces-ver">
				<x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="cargas.edit" :id="$objeto->id"/>
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
	</div>

</div>