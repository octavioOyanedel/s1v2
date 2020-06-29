<tr>
	<!-- 7 columnas -->
	<!-- clase -->
	<td><span class="objeto-tipo"><i>Socio</i></span></td>

	<!-- descripción -->
	<td>
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			Desvinculado
		@else
			Activo
		@endif
	</td>
	<!-- detalle -->
	<td>
		{{ $objeto->nombre1 }} {{ $objeto->nombre2 }} {{ $objeto->apellido1 }} {{ $objeto->apellido2 }} - {{ formatoRut($objeto->rut) }}
	</td>
	<!-- acciones -->
	<!-- ver -->
	<td class="text-center">
		<!-- socios -->
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="mostrar_desvinculado" :id="$objeto->id"/>
		@else
			<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="socios.show" :id="$objeto->id"/>						
		@endif		
	</td>
	<!-- editar -->
	<td class="text-center">
		<!-- socios -->
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			<x-enlace-accion titulo="No habilitado, antes reincorporar." color="grey-text" icono="fa-pen" ruta="" id=""/>
		@else
        	<x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="socios.edit" :id="$objeto->id"/>
        @endif							
	</td>
	<!-- eliminar / reincorporar -->
	<td class="text-center">
		<!-- socios -->
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			<x-enlace-accion titulo="Reincorporar" color="text-success" icono="fa-plus-circle" ruta="" :id="$objeto->id"/>
		@else
        	<x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$objeto->id"/>
        @endif	
	</td>
	<!-- cuadrar otros resultados reg. contables -->
	<td class="text-center">
		<!-- socios -->
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			<x-enlace-accion titulo="No habilitado, antes reincorporar." color="grey-text" icono="fa-user-graduate" ruta="" id=""/>
		@else
			@if ($objeto->estudios->count() != 0)
				<x-enlace-accion titulo="Estudios Realizados" color="text-success" icono="fa-user-graduate" ruta="estudios.index" :id="$objeto->id"/>
			@else
				<x-enlace-accion titulo="Sin Estudios Realizados" color="grey-text" icono="fa-user-graduate" ruta="estudios.create" :id="$objeto->id"/>
			@endif		
	    @endif							
	</td>

	<td class="text-center">
		<!-- socios -->
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			<x-enlace-accion titulo="No habilitado, antes reincorporar." color="grey-text" icono="fa-users" ruta="" id=""/>
		@else
			@if ($objeto->cargas->count() != 0)
				<x-enlace-accion titulo="Cargas Familiares" color="purple-text" icono="fa-users" ruta="cargas_listar" :id="$objeto->id"/>
			@else
				<x-enlace-accion titulo="Sin Cargas Familiares" color="grey-text" icono="fa-users" ruta="cargas.create" :id="$objeto->id"/>
			@endif			
	    @endif							
	</td>
	<!-- Ventanas modales  -->
	<!-- socios -->
	@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
		<x-modal :id="$objeto->id" titulo="Reincorporar Socio" csrf="post" action="reincorporar" anexos=""/>
	@else
		<x-modal :id="$objeto->id" titulo="Eliminar Socio" csrf="delete" action="socios.destroy" :anexos="$anexos"/>	
	@endif		
</tr>