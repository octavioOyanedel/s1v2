@extends('layouts.app')

@section('content')

    <!-- formulario login -->
    <div class="contenedor-form-login">
        <x-form id="login-form" colecciones="" objetos="" alinear="text-center" metodo="POST" action="login" csrf="post" titulo="Iniciar sesión" colorBoton="btn-primary" tituloBoton="Ingresar" tamanoBoton="" largoBoton="btn-block" idBoton="" extra="" />
    </div>

@endsection
