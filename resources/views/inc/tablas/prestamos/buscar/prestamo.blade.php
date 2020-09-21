<tr>
	<!-- 7 columnas -->
	<!-- clase -->
	<td><span class="objeto-tipo"><i>Préstamo</i></span></td>

	<!-- descripción -->
	<td>
		{{ $objeto->estado->nombre }}
	</td>
	<!-- detalle -->
	<td>
		{{ $objeto->socio->nombre1 }} {{ $objeto->socio->nombre2 }} {{ $objeto->socio->apellido1 }} {{ $objeto->socio->apellido2 }} - {{ formatoRut($objeto->socio->rut) }} | #: {{ $objeto->numero }} | Cheque: {{ $objeto->cheque }} | Monto: {{ formatoMoneda($objeto->monto) }}  
	</td>
	<!-- acciones -->
	<!-- ver -->
	<td class="text-center">
		<!-- usuarios -->
		<x-enlace-accion titulo="Ver" color="text-primary" icono="fa-eye" ruta="prestamos.show" :id="$objeto->id"/>							
	</td>
	<!-- editar -->
	<td class="text-center">
		<!-- usuarios -->
        <x-enlace-accion titulo="Editar" color="text-warning" icono="fa-pen" ruta="prestamos.edit" :id="$objeto->id"/>					
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
	<x-modal :id="$objeto->id" titulo="Eliminar Préstamo" csrf="delete" action="prestamos.destroy" anexos=""/>	

</tr>