<form id="{{ $id }}" class="{{ $alinear }} border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">
    
	@include(obtenerCsrf($csrf))

	<p class="h4 mb-4">{{ $titulo }}</p>

	<!-- Correo -->
	<x-input label="no" tipo="email" nombre="email" id="email" margen="mb-4" tamano="" valor="" placeholder="Correo" obligatorio="si"/>
	<!-- Password -->
	<x-input label="no" tipo="password" nombre="password" id="password" margen="mb-4" tamano="" valor="" placeholder="Contraseña" obligatorio="si"/>

    <div>
        <!-- Olvidó password -->
        @if (Route::has('password.request'))
        	<a href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
        @endif
    </div>

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
    <!-- Red social -->
    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>   

</form>