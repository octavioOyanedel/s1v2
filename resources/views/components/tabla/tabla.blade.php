<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

	@if ($total > 0)
		<!-- Filtro tabla -->
		<x-filtro action="" filtro="" :total="$total" />

	    <div class="table-responsive">
			<table class="table table-striped table-hover table-sm">
				<thead>
					<tr>
						<th></th>
		                <th></th>
		                <th></th>
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
								@endswitch		
							</td>
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