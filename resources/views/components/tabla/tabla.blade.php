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
							<td class="text-center">
								@if ($item instanceof App\Socio && $item->categoria_id != 1)
									<a title="Ver" class="p-2 text-primary" href="{{ route('mostrar_desvinculado',['id'=>$item->id]) }}">
										<i class="fas fa-eye"></i>
									</a>	
								@else
									<a title="Ver" class="p-2 text-primary" href="{{ route($ver,$item->id) }}">
										<i class="fas fa-eye"></i>
									</a>								
								@endif

							</td>
							<td class="text-center">
								@if ($item instanceof App\Socio && $item->categoria_id != 1)
									<a title="Editar no disponible, primero debe reincorporar socio." class="p-2 grey-text">
										<i class="fas fa-pen"></i>
									</a>	
								@else
									<a title="Editar" class="p-2 text-warning" href="{{ route($editar,$item->id) }}">
										<i class="fas fa-pen"></i>
									</a>							
								@endif								
							</td>
							<!-- data-target permite distinguir modal -->
							<td class="text-center">
								@if ($item instanceof App\Socio && $item->categoria_id != 1)
									<a title="Reincorporar" class="p-2 text-success" href="#">
										<i class="fas fa-plus-circle"></i>
									</a>	
								@else
									<a title="Eliminar" class="p-2 text-danger" data-toggle="modal" data-target="#ventanaModal{{ $item->id }}">
										<i class="fas fa-trash"></i>
									</a>							
								@endif		
							</td>
							<!-- Ventana modal  -->
							<x-modal :id="$item->id" :titulo="$tituloModal" csrf="delete" :action="$actionModal" :texto="$textoModal" :anexos="$anexos"/>						
							@include(obtenerContenidoTabla($contenido))
						</tr>
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