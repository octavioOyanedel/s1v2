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

				@switch($titulo)
					@case('Reincorporar Socio')
						@include(obtenerCsrf('post'))
					@break
					@default
					    @include(obtenerCsrf($csrf))									        
				@endswitch	
					

					<div class="modal-body">
						@switch($titulo)
						    @case('Eliminar Usuario')
								<!-- Mensaje autoeliminación de usuario o borrado normal de registro-->
								@if ($anexos === '' && (int)$id === Auth::user()->id)
									<div class="alert alert-danger text-center" role="alert">
										<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;</strong>Si elimina su cuenta de usuario la aplicación se cerrará y no podrá ingresar nuevamente. ¿Está seguro/a que desea eliminar su cuenta de usuario?				
									</div>
								@else
									<div class="alert alert-warning text-center" role="alert">
										<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;</strong>¿Estás seguro/a que desea eliminar {{ $texto }}				
									</div>							
								@endif
					        @break
						    @case('Eliminar Socio')
								<!-- Desvinculación de socio -->
								@if ($anexos != '' || $anexos != null)
									<div class="alert alert-warning text-center" role="alert">
										<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;</strong>¿Estás seguro/a que desea eliminar {{ $texto }}
									</div>									
									<div class="">
										<!-- Categoria -->
										<x-select :colecciones="$anexos" keyColeccion="categorias" objetos="" keyObjeto="" label="Categoría" nombre="categoria_id" id="categoria_id" tamano="custom-select-sm" obligatorio="si" nuevo="no"/>
									</div> 				
								@endif	
					        @break
						    @case('Reincorporar Socio')
								<div class="alert alert-warning text-center" role="alert">
									<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;&nbsp;</strong>¿Estás seguro/a que desea reincorporar este socio?
								</div>	
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