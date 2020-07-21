<td>{{ $item->estado_id }}</td>
<td class="text-center">{{ formatoFecha($item->fecha) }}</td>
<td>{{ $item->socio_id }}</td>
<td>{{ $item->numero }}</td>
<td>{{ $item->cuenta_id }}</td>
<td>{{ $item->cheque }}</td>
<td>{{ formatoMoneda($item->monto) }}</td>
<td>{{ $item->metodo_id }}</td>
<td class="text-center">{{ $item->cuotas }}</td>
<td class="text-center">{{ noAplica($item->fecha_pago) }}</td>
