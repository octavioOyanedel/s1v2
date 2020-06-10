<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />

	<!-- Rango fecha nacimiento -->
	<x-rango-fecha label="Fecha de Nacimiento" inicio="fecha_nac_ini" fin="fecha_nac_fin"/>

    <!-- Rango edades -->
    <x-rango-edad label="Edades" inicio="edad_ini" fin="edad_fin"/>

    <!-- parentesco -->
    <x-select :colecciones="$colecciones" keyColeccion="parentescos" objetos="" keyObjeto="" label="Parentesco" nombre="parentesco_id" id="parentesco_id" tamano="custom-select-sm" obligatorio="no" nuevo="si"/>

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>
