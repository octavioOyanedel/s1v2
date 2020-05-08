<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

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