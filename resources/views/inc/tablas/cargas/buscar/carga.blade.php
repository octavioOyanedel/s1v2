<tr>
	<!-- 7 columnas -->
	<!-- clase -->
	<td><span class="objeto-tipo"><i>Carga Familiar</i></span></td>

	<!-- descripción -->
	<td>
		{{ $objeto->parentesco->nombre }}
	</td>
	<!-- detalle -->
	<td>
		{{ $objeto->nombre1 }} {{ $objeto->nombre2 }} {{ $objeto->apellido1 }} {{ $objeto->apellido2 }} - {{ formatoRut($objeto->rut) }}
	</td>
	<!-- acciones -->
	<!-- ver -->
	<td class="text-center">
		<!-- usuarios -->
		<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="cargas.show" :id="$objeto->id"/>							
	</td>
	<!-- editar -->
	<td class="text-center">
		<!-- usuarios -->
        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="cargas.edit" :id="$objeto->id"/>					
	</td>
	<!-- eliminar / reincorporar -->
	<td class="text-center">
		<!-- usuarios -->
        <x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$objeto->id"/>
	</td>
	<!-- cuadrar otros resultados reg. contables -->
	<td class="text-center">otro</td>
	<td class="text-center">otro</td>

	<!-- Ventanas modales  -->
	<!-- usuarios -->
	<x-modal :id="$objeto->id" titulo="Eliminar Carga Familiar" csrf="delete" action="cargas.destroy" anexos=""/>	

</tr>