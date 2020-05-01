@extends('layouts.app')

@section('content')

    <!-- formulario reser password -->
    <div class="contenedor-form-login">
        <x-form id="reset-form" colecciones="" objetos="" alinear="text-center" metodo="POST" action="password.email" csrf="post" titulo="Recuperar Contraseña" colorBoton="btn-primary" tituloBoton="Enviar enlace" tamanoBoton="" largoBoton="btn-block" idBoton="reset"/>
    </div>
    
@endsection
