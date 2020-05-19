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
				<form id="{{ obtenerIdFormulario($label) }}" method="post">
					@include(obtenerCsrf('post'))
					<div class="modal-body">
						@include('layouts.inc.mensajes.obligatorio')

						<!-- form nuevo -->
						@switch($label)
						    @case('Ciudad')
						        @include('inc.forms.socio.modal.nueva_urbe')
						    @break
						    @case('Sede')
						        @include('inc.forms.socio.modal.nueva_sede')
						    @break
						    @case('Cargo')
						        @include('inc.forms.socio.modal.nuevo_cargo')
						    @break
						    @case('Nacionalidad')
						        @include('inc.forms.socio.modal.nueva_ciudadania')
						    @break
						    @case('Comuna')
						        @include('inc.forms.socio.modal.nueva_comuna')
						    @break						    						    					    				
						    @case('Área')
						        @include('inc.forms.socio.modal.nueva_area')
						    @break							          
						@endswitch
						<!-- form nuevo -->

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