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

						@switch($titulo)
						    @case('Eliminar Usuario')
						    	@if ( (int)$id === Auth::user()->id)
									<x-mensaje alerta="danger" alinear="text-center" icono="alerta" mensaje="eliminar_mismo_usuario" />
								@else
									<x-mensaje alerta="warning" alinear="text-center" icono="alerta" mensaje="eliminar_usuario_normal" />
								@endif								
					        @break
						    @case('Eliminar Socio')
								<x-mensaje alerta="warning" alinear="text-center" icono="alerta" mensaje="eliminar_socio" />
								<!-- Categoria -->
								<x-select :colecciones="$anexos" keyColeccion="categorias" objetos="" keyObjeto="" label="Categoría" nombre="categoria_id" id="categoria_id" tamano="custom-select-sm" obligatorio="si" nuevo="no"/>
					        @break
					        @case('Reincorporar Socio')
								<x-mensaje alerta="warning" alinear="text-center" icono="alerta" mensaje="reincorporar_socio" />
					        @break	
						@endswitch		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
						@switch($titulo)
							@case('Reincorporar Socio')
								<button type="submit" class="btn btn-sm btn-success">Reincorporar</button>
							@break
							@default
							    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>										        
						@endswitch						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>