<div>
	<!-- Modal -->
	<div class="modal fade" id="ventanaModal{{ $label }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Agregar {{ $label }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="nueva-ciudad" action="{{ route($action) }}" method="post">
					@include(obtenerCsrf('post'))
					<div class="modal-body">						
						<!-- ciudad -->
						<x-input label="Nombre" tipo="text" nombre="nombre" id="nombre-ciudad" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Valparaíso" obligatorio="no"/>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="nuevo-form btn btn-sm btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>