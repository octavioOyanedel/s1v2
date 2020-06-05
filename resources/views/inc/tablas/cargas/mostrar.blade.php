<tr>
	<th><b>{{ $cabecera }}</b></th>
	<td>
		@switch($nombre)
		    @case('nombre1')
		        {{ $objeto['nombre1'] }} {{ $objeto['nombre2'] }} {{ $objeto['apellido1'] }} {{ $objeto['apellido2'] }}
		    @break
		    @case('socio_id')
		        {{ $objeto->socio->nombre1 }} {{ $objeto->socio->apellido1 }} {{ $objeto->socio->apellido2 }} - {{ formatoRut($objeto->socio->rut) }}
		    @break		    
		    @case('parentesco_id')
		        {{ $objeto->parentesco->nombre }}
		    @break
		    @case('rut')
		        {{ formatoRut($objeto->rut) }}
		    @break			    
		    @case('fecha_nac')
		        {{ formatoFecha($objeto->fecha_nac) }}
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