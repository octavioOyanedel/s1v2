@extends('layouts.app')

@section('content')

    <!-- formulario editar socio -->
    <div class="contenedor-form">
        <x-form id="editar-socio-form" :colecciones="$colecciones" :objetos="$objetos" alinear="text-center" metodo="POST" action="socios.update" csrf="put" titulo="Editar Socio" colorBoton="btn-primary" tituloBoton="Editar" tamanoBoton="" largoBoton="btn-block" idBoton="editar-socio"/>
    </div>
    
@endsection