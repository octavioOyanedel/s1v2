@php
    $estudio = obtenerObjeto($objetos, 'estudio');
@endphp

{{ var_dump($estudio->establecimiento_id) }}
<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action, $estudio) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />

    <!-- Nivel académico -->
    <x-enlace-modal label="Nivel" />
    <x-select :colecciones="$colecciones" keyColeccion="grados" :objetos="$objetos" keyObjeto="estudio" label="Nivel Académico" nombre="grado_id" id="grado_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- Institución -->
    <x-enlace-modal label="Institución" />
    <x-select-ajax keyObjeto="estudio" :objetos="$objetos" nombre="establecimiento_id" id="establecimiento_id" label="Institución" idOld="old_establecimiento" idEditar="editar_establecimiento" obligatorio="si"/>

    <!-- Estado -->
    <x-enlace-modal label="Estado" />
    <x-select :colecciones="$colecciones" keyColeccion="fases" :objetos="$objetos" keyObjeto="estudio" label="Estado Estudio" nombre="fase_id" id="fase_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- Título -->
    <x-enlace-modal label="Título" />
    <x-select-ajax keyObjeto="estudio" :objetos="$objetos" nombre="titulo_id" id="titulo_id" label="Título" idOld="old_titulo" idEditar="editar_titulo" obligatorio="no"/>        

    <input type="hidden" name="socio_id" value="{{ $estudio->socio_id }}">

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>