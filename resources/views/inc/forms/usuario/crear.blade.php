<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    @include('layouts.inc.mensajes.obligatorio')

	<!-- Primer nombre -->
	<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Juan" obligatorio="si"/>

    <!-- Segundo nombre -->
    <x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Diego" obligatorio="no"/>

    <!-- Apellido paterno -->
    <x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Soto" obligatorio="si"/>

    <!-- Apellido materno -->
    <x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Pérez" obligatorio="no"/>

    <!-- Correo -->
    <x-input label="Correo" tipo="email" nombre="email" id="email" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. correo@pucv.cl" obligatorio="si"/>        

    <!-- Password nueva-->
    <x-input label="Contraseña" tipo="password" nombre="password" id="password" margen="mb-4" tamano="" valor="" placeholder="" obligatorio="si"/>

    <!-- Confirmar password -->
    <x-input label="Confirmar Contraseña" tipo="password" nombre="password_confirmation" id="password_confirmation" margen="mb-4" tamano="" valor="" placeholder="" obligatorio="si"/>

    <!-- Privilegio -->
    <x-select :colecciones="$colecciones" keyColeccion="privilegios" objetos="" keyObjeto="" label="Privilegio" nombre="privilegio_id" id="privilegio_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>