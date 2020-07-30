@extends('layouts.app')

@section('content')

    <!-- formulario editar préstamo -->
    <div class="contenedor-form">
        <x-form id="editar-prestamo-form" :colecciones="$colecciones" :objetos="$objetos" alinear="text-center" metodo="POST" action="prestamos.update" csrf="post" titulo="Editar Préstamo" colorBoton="btn-primary" tituloBoton="Editar" tamanoBoton="" largoBoton="btn-block" idBoton="editar-prestamo" extra=""/>
    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Interés" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Cuenta" colecciones="" keyColeccion="" />
@endsection