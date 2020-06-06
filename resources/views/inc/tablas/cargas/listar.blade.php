<td>{{ $item->socio->nombre1 }} {{ $item->socio->apellido1 }} {{ $item->socio->apellido2 }} - {{ formatoRut($item->socio->rut) }}</td>
<td>{{ $item->apellido1 }} {{ $item->apellido2 }} {{ $item->nombre1 }} {{ $item->nombre2 }}</td>
<td>{{ formatoRut($item->rut) }}</td>
<td class="text-center">{{ formatoFecha($item->fecha_nac) }}</td>
<td>{{ $item->parentesco->nombre }}</td>
