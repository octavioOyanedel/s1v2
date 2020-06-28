<td>{{ $item->grado->nombre }}</td>
<td>{{ $item->establecimiento->nombre }}</td>
<td>{{ $item->fase->nombre }}</td>
<td>
	{{ existeRegistro($item->titulo, 'Título')}}
</td>