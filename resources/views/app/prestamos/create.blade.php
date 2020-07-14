@extends('layouts.app')

@section('content')

    <!-- formulario solicitar prestamo -->
    <div class="contenedor-form">
        <x-form id="crear-prestamo-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="prestamos.store" csrf="post" titulo="Solicitar Préstamo" colorBoton="btn-primary" tituloBoton="Solicitar" tamanoBoton="" largoBoton="btn-block" idBoton="solicitar-prestamo" extra=""/>
    </div>

    <!-- Modal nuevo registro -->
{{--     <x-modal-nuevo label="Parentesco" colecciones="" keyColeccion="" /> --}}
@endsection