<tr>
	<th><b>{{ $cabecera }}</b></th>
	<td>
		@switch($nombre)
		    @case('nombre1')
		        {{ $objeto['nombre1'] }} {{ $objeto['nombre2'] }} {{ $objeto['apellido1'] }} {{ $objeto['apellido2'] }}
		    @break
		    @case('rut')
		        {{ formatoRut($objeto->rut) }}
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
		    @case('fecha_nac')
		        {{ formatoFecha($objeto->fecha_nac) }}
		    @break
		    @case('fecha_pucv')
		        {{ formatoFecha($objeto->fecha_pucv) }}
		    @break
		    @case('fecha_sind1')
		        {{ formatoFecha($objeto->fecha_sind1) }}
		    @break				    
		    @case('created_at')
		        {{ formatoFechaHora($objeto->created_at) }}
		    @break		    
		    @case('created_at')
		        {{ formatoFechaHora($objeto->created_at) }}
		    @break
		    @case('updated_at')
		        {{ formatoFechaHora($objeto->updated_at) }}
		    @break
		    @case('deleted_at')
		        {{ formatoFechaHora($objeto->deleted_at) }}
		    @break			    
		    @default
		    	{{ $objeto[$nombre] }}
		@endswitch

	</td>					
</tr>