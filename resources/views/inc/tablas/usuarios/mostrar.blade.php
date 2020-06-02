<tr>
	<th><b>{{ $cabecera }}</b></th>
	<td>
		@switch($nombre)
		    @case('nombre1')
		        {{ $objeto['nombre1'] }} {{ $objeto['nombre2'] }} {{ $objeto['apellido1'] }} {{ $objeto['apellido2'] }}
		    @break
		    @case('privilegio_id')
		        {{ $objeto->privilegio->nombre }}
		    @break
		    @case('created_at')
		        {{ formatoFechaHora($objeto->created_at) }}
		    @break
		    @case('updated_at')
		        {{ formatoFechaHora($objeto->updated_at) }}
		    @break	    
		    @default
		    	{{ $objeto[$nombre] }}
		@endswitch

	</td>					
</tr>