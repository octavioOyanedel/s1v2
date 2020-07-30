<td>{{ $item->estado->nombre }}</td>
<td class="text-center">{{ formatoFecha($item->fecha) }}</td>
<td>
	{{ $item->socio->nombre1 }} {{ $item->socio->nombre2 }} {{ $item->socio->apellido1 }} {{ $item->socio->apellido2 }} - {{ formatoRut($item->socio->rut) }}
</td>
<td class="text-center">{{ $item->numero }}</td>
<td>{{ $item->cuenta->tipo }} N° {{ $item->cuenta->numero }} {{ $item->cuenta->banco }}</td>
<td>{{ $item->cheque }}</td>
<td>{{ formatoMoneda($item->monto) }}</td>
<td>{{ $item->metodo->nombre }}</td>
<td class="text-center">{{ noAplica($item->cuotas) }}</td>
<td class="text-center">{{ noAplica(formatoFecha($item->fecha_pago)) }}</td>
