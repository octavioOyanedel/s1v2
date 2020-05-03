@extends('layouts.app')

@section('content')

    <!-- formulario reset password -->
    <div class="contenedor-form-login">
        <x-form id="editar-pass-form" colecciones="" objetos="" alinear="text-center" metodo="POST" action="editar_passwd" csrf="put" titulo="Cambiar Contraseña" colorBoton="btn-primary" tituloBoton="Cambiar" tamanoBoton="" largoBoton="btn-block" idBoton="cambiar-pass"/>
    </div>
    
@endsection
