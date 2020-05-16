<div>
	<!-- Modal -->
	<div class="modal fade" id="ventanaModal{{ $label }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">{{ $titulo }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					@include(obtenerCsrf($csrf))
					<div class="modal-body">
		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>