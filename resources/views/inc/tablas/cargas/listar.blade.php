<td>{{ $item->apellido1 }} {{ $item->apellido2 }} {{ $item->nombre1 }} {{ $item->nombre2 }}</td>
<td>{{ formatoRut($item->rut) }}</td>
<td class="text-center">{{ formatoFecha($item->fecha_nac) }}</td>
<td>{{ $item->parentesco->nombre }}</td>
