<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />

    {{-- Tabla resúmen préstamo --}}

    <table class="table table-striped table-hover table-sm">
        <tbody>
            <tr>
                <th><b>Monto Préstamo:</b></th>
                <td>{{ formatoMoneda(obtenerMontoPrestamo($extra->id)) }}</td>
            </tr>        
            <tr>
                <th><b>Abonos: </b></th>
                <td>{{ formatoMoneda(sumarAbonos($extra->id)) }}</td>
            </tr>    
            <tr>
                <th><b>Total Deuda: </b></th>
                <td>{{ formatoMoneda(obtenerMontoPrestamo($extra->id) - sumarAbonos($extra->id)) }}</td>
            </tr>                
        </tbody>

    </table>

    <!-- Fecha abono -->
    <x-input label="Fecha Abono" tipo="text" nombre="fecha" id="fecha" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 01-01-2020" obligatorio="si"/>  

    <!-- Monto -->
    <x-input label="Monto" tipo="text" nombre="monto" id="monto" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 30000" obligatorio="si"/>        

    <input type="hidden" name="prestamo_id" value="{{ $extra->id }}">

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
		
</form>