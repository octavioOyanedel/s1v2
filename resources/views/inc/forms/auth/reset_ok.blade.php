<form id="{{ $id }}" class="{{ $alinear }} border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">
    @include(obtenerCsrf($csrf))
    <p class="h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />
    @include('layouts.inc.mensajes.requisitos_pass')
    
    <!-- Token -->
    <input type="hidden" name="token" value="{{ request()->token }}">

    <!-- Correo -->
    <x-input label="no" tipo="email" nombre="email" id="email" margen="mb-4" tamano="" valor="" placeholder="Correo" obligatorio="si"/>

    <!-- Password -->
    <x-input label="no" tipo="password" nombre="password" id="password" margen="mb-4" tamano="" valor="" placeholder="Contraseña" obligatorio="si"/>

    <!-- Confirmar password -->
    <x-input label="no" tipo="password" nombre="password_confirmation" id="password_confirmation" margen="mb-4" tamano="" valor="" placeholder="Confirmar Contraseña" obligatorio="si"/>

    <!-- Botón -->
    <button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>

    <div>
        <!-- Volver -->
        <a href="{{ route('login') }}">Volver a iniciar sesión</a>
    </div>    
</form>