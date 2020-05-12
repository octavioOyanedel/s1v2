@extends('layouts.app')

@section('content')

    <!-- formulario crear usuario -->
    <div class="contenedor-form">
        <x-form id="crear-socio-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="socios.store" csrf="post" titulo="Incorporar Socio" colorBoton="btn-primary" tituloBoton="Incorporar" tamanoBoton="" largoBoton="btn-block" idBoton="incorporar-socio"/>
    </div>
    
@endsection
