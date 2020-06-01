<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action, Auth::user()) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />
    @include('layouts.inc.mensajes.requisitos_pass')

    <!-- Password actual-->
    <x-input label="Contraseña Actual" tipo="password" nombre="actual" id="actual" margen="mb-4" tamano="" valor="" placeholder="" obligatorio="si"/>

    <!-- Password nueva-->
    <x-input label="Nueva Contraseña" tipo="password" nombre="nueva" id="nueva" margen="mb-4" tamano="" valor="" placeholder="" obligatorio="si"/>

    <!-- Confirmar password -->
    <x-input label="Confirmar Contraseña" tipo="password" nombre="confirmar" id="confirmar" margen="mb-4" tamano="" valor="" placeholder="" obligatorio="si"/>

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>