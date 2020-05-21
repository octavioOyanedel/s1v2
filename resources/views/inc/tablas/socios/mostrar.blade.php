<tr>
	<th><b>{{ $cabecera }}</b></th>
	<td>
		@switch($nombre)
		    @case('nombre1')
		        {{ $objeto['nombre1'] }} {{ $objeto['nombre2'] }} {{ $objeto['apellido1'] }} {{ $objeto['apellido2'] }}
		    @break
		    @case('urbe_id')
		        {{ $objeto->urbe->nombre }}
		    @break
		    @case('comuna_id')
		        {{ $objeto->comuna->nombre }}
		    @break
		    @case('sede_id')
		        {{ $objeto->sede->nombre }}
		    @break
		    @case('area_id')
		        {{ $objeto->area->nombre }}
		    @break
		    @case('cargo_id')
		        {{ $objeto->cargo->nombre }}
		    @break
		    @case('categoria_id')
		        {{ $objeto->categoria->nombre }}
		    @break
		    @case('ciudadania_id')
		        {{ $objeto->ciudadania->nombre }}
		    @break			    	  		    		    		    		    	    
		    @default
		    	{{ $objeto[$nombre] }}
		@endswitch

	</td>					
</tr>