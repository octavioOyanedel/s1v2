@php
    $carga = obtenerObjeto($objetos, 'carga');
@endphp

<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action, $carga) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />

    <!-- Rut -->
    <x-input label="Rut" tipo="text" nombre="rut" id="rut" margen="mb-4" tamano="form-control-sm" :valor="$carga->rut" placeholder="Ej. 11222333k" obligatorio="si"/>

	<!-- Primer nombre -->
	<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" :valor="$carga->nombre1" placeholder="Ej. Juan" obligatorio="si"/>

    <!-- Segundo nombre -->
    <x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" :valor="$carga->nombre2" placeholder="Ej. Diego" obligatorio="no"/>

    <!-- Apellido paterno -->
    <x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" :valor="$carga->apellido1" placeholder="Ej. Soto" obligatorio="si"/>

    <!-- Apellido materno -->
    <x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" :valor="$carga->apellido2" placeholder="Ej. Pérez" obligatorio="no"/>    

    <!-- Fecha nacimiento -->
    <x-input label="Fecha Nacimiento" tipo="text" nombre="fecha_nac" id="fecha_nac" margen="mb-4" tamano="form-control-sm" :valor="formatoFecha($carga->fecha_nac)" placeholder="Ej. 01-01-2020" obligatorio="no"/> 

    <input type="hidden" name="socio_id" value="{{ $carga->socio_id }}">

    <!-- Parentesco -->
    <x-enlace-modal label="Parentesco" />
    <x-select :colecciones="$colecciones" keyColeccion="parentescos" :objetos="$objetos" keyObjeto="carga" label="Parentesco" nombre="parentesco_id" id="parentesco_id" tamano="custom-select-sm" obligatorio="si" nuevo="si"/>       
    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>