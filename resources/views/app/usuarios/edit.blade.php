@extends('layouts.app')

@section('content')

    <!-- formulario editar usuario -->
    <div class="contenedor-form-login">
        <x-form id="editar-usuario-form" :colecciones="$colecciones" :objetos="$objetos" alinear="text-center" metodo="POST" action="usuarios.update" csrf="put" titulo="Editar Usuario" colorBoton="btn-primary" tituloBoton="Editar" tamanoBoton="" largoBoton="btn-block" idBoton="editar-usuario"/>
    </div>
    
@endsection
