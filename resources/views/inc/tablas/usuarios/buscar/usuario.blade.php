<tr>
	<!-- 7 columnas -->
	<!-- clase -->
	<td><span class="objeto-tipo"><i>Usuario</i></span></td>

	<!-- descripción -->
	<td>

	</td>
	<!-- detalle -->
	<td>
		{{ $objeto->nombre1 }} {{ $objeto->nombre2 }} {{ $objeto->apellido1 }} {{ $objeto->apellido2 }} - {{ $objeto->email }}
	</td>
	<!-- acciones -->
	<!-- ver -->
	<td class="text-center">
		<!-- usuarios -->
		<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="usuarios.show" :id="$objeto->id"/>							
	</td>
	<!-- editar -->
	<td class="text-center">
		<!-- usuarios -->
        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="usuarios.edit" :id="$objeto->id"/>					
	</td>
	<!-- eliminar / reincorporar -->
	<td class="text-center">
		<!-- usuarios -->
        <x-enlace-accion titulo="Eliminar" color="text-danger" icono="fa-trash" ruta="" :id="$objeto->id"/>
	</td>
	<!-- cuadrar otros resultados reg. contables -->
	<td>otro</td>
	<!-- Ventanas modales  -->
	<!-- usuarios -->
	<x-modal :id="$objeto->id" titulo="Eliminar Usuario" csrf="delete" action="usuarios.destroy" :anexos="$anexos"/>	

</tr>