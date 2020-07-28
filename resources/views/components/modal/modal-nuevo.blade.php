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
						
    					<x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />						

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
						    @case('Parentesco')
						        @include('inc.forms.carga.modal.nuevo_parentesco')
						    @break
						    @case('Nivel')
						        @include('inc.forms.estudio.modal.nuevo_nivel')
						    @break
						    @case('Estado')
						        @include('inc.forms.estudio.modal.nueva_fase')
						    @break	
						    @case('Institución')
						        @include('inc.forms.estudio.modal.nuevo_establecimiento')
						    @break		
						    @case('Título')
						        @include('inc.forms.estudio.modal.nuevo_titulo')
						    @break
						    @case('Interés')
						        @include('inc.forms.prestamo.modal.nuevo_interes')
						    @break
						    @case('Cuenta')
						        @include('inc.forms.prestamo.modal.nueva_cuenta')
						    @break							    					    								    						    						  							    				    						          
						@endswitch
						<!-- form nuevo -->

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="nuevo-form btn btn-sm btn-primary">
							<span class="mr-1">
								<div class="spinner-border" role="status">
									<span class="align-middle sr-only">Guardando...</span>
								</div>			
							</span>Agregar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>