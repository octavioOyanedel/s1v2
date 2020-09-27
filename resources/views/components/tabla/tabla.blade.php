<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

	@if ($total > 0)
		{{-- Nombre de socio --}}
		@if($anexos && $titulo === 'Cargas Familiares')
	        <p class="text-center">Pertenecientes a:</p>
	        <p class="text-center active">{{ strtoupper($anexos->nombre1.' '.$anexos->nombre2.' '.$anexos->apellido1.' '.$anexos->apellido2) }}</p>			
		@endif

		@if($anexos && $titulo === 'Estudios Realizados')
	        <p class="text-center">Por:</p>
	        <p class="text-center active">{{ strtoupper($anexos->nombre1.' '.$anexos->nombre2.' '.$anexos->apellido1.' '.$anexos->apellido2) }}</p>				
		@endif		

		<!-- Filtro tabla -->
		<x-filtro action="" filtro="" :total="$total" />

	    <div class="table-responsive">
			<table class="table table-striped table-hover table-sm">
				<thead>
					<tr>
						<th></th>
		                <th></th>
		                <th></th>
		                {{-- icono estudios --}}
		                @if ($contenido === 'socios')
		                	<th></th>
		                	<th></th>
		                @endif
		                @if ($contenido === 'prestamos')
		                	<th></th>
		                @endif		                
						@foreach (obtenerCabecerasTablas($contenido) as $nombre => $clase)
							<th class="{{ $clase }}"><b>{{ $nombre }}</b></th>
						@endforeach	                
					</tr>
				</thead>
				<tbody>
					@foreach ($coleccion as $item)
						<tr>
							<!-- ver -->
							<td class="text-center">
								@switch($contenido)
								    @case('usuarios')
								        <x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="usuarios.show" :id="$item->id"/>
								    @break
								    @case('socios')
										@if ($item instanceof App\Socio && $item->categoria_id != 1)
											<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="mostrar_desvinculado" :id="$item->id"/>
										@else
								        	<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="socios.show" :id="$item->id"/>
								        @endif
								    @break
								    @case('cargas')
								        <x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="cargas.show" :id="$item->id"/>
								    @break		
								    @case('estudios')
								        <x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="estudios.show" :id="$item->id"/>
								    @break	
								    @case('prestamos')
								        <x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="prestamos.show" :id="$item->id"/>
								    @break											    								    						    								    
								@endswitch							
							</td>
							<!-- editar -->
							<td class="text-center">
								@switch($contenido)
								    @case('usuarios')
								        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="usuarios.edit" :id="$item->id"/>
								    @break
								    @case('socios')
										@if ($item instanceof App\Socio && $item->categoria_id != 1)
											<x-enlace-accion titulo="No habilitado, antes reincorporar." color="grey-text" icono="fa-pen" ruta="" id=""/>
										@else
								        	<x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="socios.edit" :id="$item->id"/>
								        @endif								        
								    @break
								    @case('cargas')
								        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="cargas.edit" :id="$item->id"/>
								    @break
								    @case('estudios')
								        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="estudios.edit" :id="$item->id"/>
								    @break	
								    @case('prestamos')
								        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="prestamos.edit" :id="$item->id"/>
								    @break									    								    							    								    
								@endswitch						
							</td>
							<!-- eliminar: data-target permite distinguir modal -->
							<td class="text-center">
								@switch($contenido)
								    @case('usuarios')
								        <x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$item->id"/>								        
								    @break
								    @case('socios')
										@if ($item instanceof App\Socio && $item->categoria_id != 1)
											<x-enlace-accion titulo="Reincorporar" color="text-success" icono="fa-plus-circle" ruta="" :id="$item->id"/>
										@else
								        	<x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$item->id"/>
								        @endif									        							        
								    @break
								    @case('cargas')
								        <x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$item->id"/>								        
								    @break	
								    @case('estudios')
								        <x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$item->id"/>								        
								    @break	
								    @case('prestamos')
								        <x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$item->id"/>								        
								    @break									    								    							    							    
								@endswitch		
							</td>
			                {{-- icono estudios --}}
			                @if ($contenido === 'socios')
			                	<td>
			                		@if ($item->estudios->count() != 0)
			                			<x-enlace-accion titulo="Estudios Realizados" color="text-success" icono="fa-user-graduate" ruta="estudios.index" :id="$item->id"/>
			                		@else
			                			<x-enlace-accion titulo="Sin Estudios Realizados" color="grey-text" icono="fa-user-graduate" ruta="estudios.create" :id="$item->id"/>
			                		@endif			                				                		
			                	</td>
			                	<td>
			                		@if ($item->cargas->count() != 0)
			                			<x-enlace-accion titulo="Cargas Familiares" color="purple-text" icono="fa-users" ruta="cargas_listar" :id="$item->id"/>
			                		@else
			                			<x-enlace-accion titulo="Sin Cargas Familiares" color="grey-text" icono="fa-users" ruta="cargas.create" :id="$item->id"/>
			                		@endif
			                		
			                	</td>			                	
			                @endif	
			                {{-- icono abonar --}}
			                @if ($contenido === 'prestamos')
								<td class="text-center">
									@if ($item->metodo_id == 2)
										<x-enlace-accion titulo="Abonar" color="text-default" icono="fa-hand-holding-usd" ruta="abonos.create" :id="$item->id"/>
									@else
										<x-enlace-accion titulo="No habilitado, abono solo permitido para préstamos DEPOSITO." color="grey-text" icono="fa-hand-holding-usd" ruta="" id=""/>
									@endif
									
								</td>	
							@endif	
							@include(obtenerContenidoTabla($contenido))
						</tr>
						<!-- ventanas modales -->
						@switch($contenido)
						    @case('usuarios')
						        <x-modal :id="$item->id" titulo="Eliminar Usuario" csrf="delete" action="usuarios.destroy" :anexos="$anexos"/>					        
						    @break
						    @case('socios')
								@if ($item instanceof App\Socio && $item->categoria_id != 1)
									<x-modal :id="$item->id" titulo="Reincorporar Socio" csrf="post" action="reincorporar" anexos=""/>
								@else
						        	<x-modal :id="$item->id" titulo="Eliminar Socio" csrf="delete" action="socios.destroy" :anexos="$anexos"/>	
						        @endif							    						        
						    @break
						    @case('cargas')
						        <x-modal :id="$item->id" titulo="Eliminar Carga Familiar" csrf="delete" action="cargas.destroy" anexos=""/>					        
						    @break	
						    @case('estudios')
						        <x-modal :id="$item->id" titulo="Eliminar Estudio Realizado" csrf="delete" action="estudios.destroy" anexos=""/>					        
						    @break		
						    @case('prestamos')
						        <x-modal :id="$item->id" titulo="Eliminar Préstamo" csrf="delete" action="prestamos.destroy" anexos=""/>					        
						    @break							    						    					 							    
						@endswitch												
					@endforeach		
				</tbody>			
			</table>
		</div>
		<!-- Paginación -->
		<div class="paginacion mt-4">
			{{ $coleccion->links() }}			
		</div>
	@else
		<div class="contenedor-form">
			@include('layouts.inc.mensajes.busqueda')
		</div>
	@endif

</div>