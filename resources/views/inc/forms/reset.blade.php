<form class="{{ $alinear }} border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">
	@include(obtenerCsrf($csrf))
	<p class="h4 mb-4">{{ $titulo }}</p>
	<!-- Correo -->
	<x-input label="no" tipo="email" nombre="email" id="email" margen="mb-4" tamano="" valor="" placeholder="Correo" obligatorio="si"/>
    <!-- Sign in button -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>
    <div>
        <!-- Volver -->
        <a href="{{ route('login') }}">Volver a iniciar sesión</a>
    </div>    
</form>