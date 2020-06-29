<tr>
	<th><b>{{ $cabecera }}</b></th>
	<td>
		@switch($nombre)
		    @case('socio_id')
		        {{ $objeto->socio->nombre1 }} {{ $objeto->socio->apellido1 }} {{ $objeto->socio->apellido2 }} - {{ formatoRut($objeto->socio->rut) }}
		    @break		
		    @case('grado_id')
		        {{ $objeto->grado->nombre }}
		    @break
		    @case('establecimiento_id')
		        {{ $objeto->establecimiento->nombre }}
		    @break		    
		    @case('fase_id')
		        {{ $objeto->fase->nombre }}
		    @break	
		    @case('titulo_id')
		    	{{ existeRegistro($objeto->titulo, 'Título')}}
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