<p class="text-center h4 mb-4">Cuotas</p>
<table class="table table-striped table-hover table-sm">
	<thead>
		<tr>
			<th scope="col"><b>#</b></th>
			<th scope="col"><b>Monto</b></th>
			<th scope="col"><b>Fecha de Pago</b></th>
			<th scope="col"><b>Estado</b></th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@foreach (obtenerCuotasDePrestamo($objeto) as $cuota)
			<tr>
				<th scope="row">1</th>
				<td>{{ formatoMoneda($cuota->monto) }}</td>
				<td>{{ formatoFecha($cuota->fecha) }}</td>
				<td>{{ $cuota->estado_id }}</td>
				<td>
					@if ($cuota->estado_id == 1)
						{{ 'pagar' }}
					@else
						{{ 'pagada' }}
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
