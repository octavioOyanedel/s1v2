<tr>
	<th><b>{{ $cabecera }}</b></th>
	<td>
		@switch($nombre)
			@case('socio_id')
				{{ $objeto->socio->nombre1 }} {{ $objeto->socio->nombre2 }} {{ $objeto->socio->apellido1 }} {{ $objeto->socio->apellido2 }} - {{ formatoRut($objeto->socio->rut) }}
			@break
		    @case('fecha')
				{{ formatoFecha($objeto->fecha) }}
		    @break
		    @case('cuenta_id')
				{{ $objeto->cuenta->tipo }} N° {{ $objeto->cuenta->numero }} {{ $objeto->cuenta->banco }}
		    @break
		    @case('cuotas')
				{{ noAplica($objeto->cuotas) }}			
		    @break
		    @case('metodo_id')
				{{ $objeto->metodo->nombre }}
		    @break
		    @case('renta_id')
				{{ $objeto->renta->cantidad }}%
		    @break	
		    @case('estado_id')
				{{ $objeto->estado->nombre }}
		    @break
		    @case('fecha_pago')
				{{ noAplica(formatoFecha($objeto->fecha_pago)) }}					
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
