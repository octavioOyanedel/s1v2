<div>
	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>
	
	<!-- Filtro tabla -->
	<x-filtro :action="$actionFiltro" :filtro="$filtro" :total="$total"/>

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
							<a title="Ver" class="p-2 text-primary" href="{{ route($ver,$item->id) }}">
								<i class="fas fa-eye"></i>
							</a>
						</td>
						<td class="text-center">
							<a title="Editar" class="p-2 text-warning" href="{{ route($editar,$item->id) }}">
								<i class="fas fa-pen"></i>
							</a>
						</td>
						<!-- data-target permite distinguir modal -->
						<td class="text-center">
							<a title="Eliminar" class="p-2 text-danger" data-toggle="modal" data-target="#ventanaModal{{ $item->id }}">
								<i class="fas fa-trash"></i>
							</a>
						</td>
						<!-- Ventana modal  -->
						<x-modal :id="$item->id" :titulo="$tituloModal" csrf="delete" :action="$actionModal" :texto="$textoModal"/>						
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
</div>