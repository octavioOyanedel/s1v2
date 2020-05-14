<td>{{ $item->apellido1 }} {{ $item->apellido2 }} {{ $item->nombre1 }} {{ $item->nombre2 }}</td>
<td>{{ $item->genero }}</td>
<td>{{ formatoRut($item->rut) }}</td>
<td class="text-center">{{ formatoFecha($item->fecha_sind1) }}</td>
<td>{{ $item->numero }}</td>
<td>{{ $item->correo }}</td>
<td class="text-center">{{ $item->anexo }}</td>
<td class="text-center">{{ $item->celular }}</td>
<td>{{ $item->sede->nombre }}</td>
<td>{{ $item->area->nombre }}</td>
<td>{{ $item->cargo->nombre }}</td>