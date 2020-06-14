<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio_rut" />

    <x-select2 :colecciones="$colecciones" keyColeccion="socios" objetos="" keyObjeto="" label="Socio" nombre="socio_id" id="socio_id" tamano="custom-select-sm" obligatorio="si" />

     <!-- Nivel académico -->
    {{-- <x-enlace-modal label="Ciudad" /> --}}
    <x-select :colecciones="$colecciones" keyColeccion="grados" objetos="" keyObjeto="" label="Nivel Académico" nombre="grado_id" id="grado_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- Institución -->
    {{-- <x-enlace-modal label="Comuna" /> --}}
    <x-select-ajax keyObjeto="" objetos="" nombre="establecimiento_id" id="establecimiento_id" label="Institución" idOld="old_establecimiento" idEditar="" obligatorio="si"/>

    <!-- Estado -->
    {{-- <x-enlace-modal label="Comuna" /> --}}
    <x-select-ajax keyObjeto="" objetos="" nombre="fase_id" id="fase_id" label="Estado Estudio" idOld="old_fase" idEditar="" obligatorio="si"/>

    <!-- Título -->
    {{-- <x-enlace-modal label="Comuna" /> --}}
    <x-select-ajax keyObjeto="" objetos="" nombre="titulo_id" id="titulo_id" label="Título" idOld="old_titulo" idEditar="" obligatorio="si"/>        

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>