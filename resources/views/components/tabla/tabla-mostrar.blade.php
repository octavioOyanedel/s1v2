<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}
		@if ($objeto->deleted_at === null)
		<a title="Editar" class="p-2 text-warning icono-editar" href="{{ route(obtenerRutaEditar($titulo),$objeto->id) }}">
			<i class="fas fa-pen"></i>
		</a>			@endif

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