<form id="{{ $id }}" class="{{ $alinear }} border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">
	@include(obtenerCsrf($csrf))
	<p class="h4 mb-4">{{ $titulo }}</p>
	
	@if (session('status'))
		<div class="alert alert-success" role="alert">
		    {{ session('status') }}

		</div>
	@endif
	
    @include('layouts.inc.mensajes.obligatorio')
	<!-- Correo -->
	<x-input label="no" tipo="email" nombre="email" id="email" margen="mb-4" tamano="" valor="" placeholder="Correo" obligatorio="si"/>
    <!-- Sign in button -->
	<button id="{{ $idBoton }}" class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">
		<span class="mr-1">
			<div class="spinner-border" role="status">
				<span class="align-middle sr-only">Enviando...</span>
			</div>			
		</span>{{ $tituloBoton }}		
	</button>

    <div>
        <!-- Volver -->
        <a href="{{ route('login') }}">Volver a iniciar sesión</a>
    </div>    
</form>