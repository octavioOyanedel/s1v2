@php
    $usuario = obtenerObjeto($objetos, 'usuario');
@endphp

<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action, $usuario) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    @include('layouts.inc.mensajes.obligatorio')

	<!-- Primer nombre -->
	<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" :valor="$usuario->nombre1" placeholder="Ej. Juan" obligatorio="si"/>

    <!-- Segundo nombre -->
    <x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" :valor="$usuario->nombre2" placeholder="Ej. Diego" obligatorio="no"/>

    <!-- Apellido paterno -->
    <x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" :valor="$usuario->apellido1" placeholder="Ej. Soto" obligatorio="si"/>

    <!-- Apellido materno -->
    <x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" :valor="$usuario->apellido2" placeholder="Ej. Pérez" obligatorio="no"/>

    <!-- Correo -->
    <x-input label="Correo" tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" :valor="$usuario->email" placeholder="Ej. correo@pucv.cl" obligatorio="si"/>        

    <!-- Privilegio -->
    <x-select :colecciones="$colecciones" keyColeccion="privilegios" :objetos="$objetos" keyObjeto="usuario" label="Privilegio" nombre="privilegio_id" id="privilegio_id" tamano="custom-select-sm" obligatorio="si"/>

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>