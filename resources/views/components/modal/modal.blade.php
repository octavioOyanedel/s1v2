<div>
	<!-- Modal -->
	<div class="modal fade" id="ventanaModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">{{ $titulo }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route($action, $id) }}" method="post">
					@include(obtenerCsrf($csrf))
					<div class="modal-body">
						<div class="alert alert-warning text-center" role="alert">
							<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;</strong>¿Estás seguro/a que desea eliminar {{ $texto }}					
						</div>	
						@if ($anexos != '' || $anexos != null)
							<div class="">
								<!-- Categoria -->
								<x-select :colecciones="$anexos" keyColeccion="categorias" objetos="" keyObjeto="" label="Categoría" nombre="categoria_id" id="categoria_id" tamano="custom-select-sm" obligatorio="si"/>  								
							</div> 
						@endif				
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>