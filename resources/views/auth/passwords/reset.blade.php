@extends('layouts.app')

@section('content')

    <!-- formulario reset password -->
    <div class="contenedor-form-login">
        <x-form id="reset-ok-form" colecciones="" objetos="" alinear="text-center" metodo="POST" action="password.update" csrf="post" titulo="Restablecer Contraseña" colorBoton="btn-primary" tituloBoton="Restablecer contraseña" tamanoBoton="" largoBoton="btn-block" idBoton="reset-ok"/>
    </div>
    
@endsection
