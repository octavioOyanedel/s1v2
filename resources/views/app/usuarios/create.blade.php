@extends('layouts.app')

@section('content')

    <!-- formulario crear usuario -->
    <div class="contenedor-form">
        <x-form id="crear-usuario-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="usuarios.store" csrf="post" titulo="Crear Usuario" colorBoton="btn-primary" tituloBoton="Crear" tamanoBoton="" largoBoton="btn-block" idBoton="crear-usuario"/>
    </div>
    
@endsection
