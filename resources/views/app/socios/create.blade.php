@extends('layouts.app')

@section('content')

    <!-- formulario crear usuario -->
    <div class="contenedor-form">
        <x-form id="crear-socio-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="socios.store" csrf="post" titulo="Incorporar Socio" colorBoton="btn-primary" tituloBoton="Incorporar" tamanoBoton="" largoBoton="btn-block" idBoton="incorporar-socio"/>

    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Ciudad" titulo="Agregar Ciudad" csrf="post" action="" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Sede" titulo="Agregar Sede" csrf="post" action="" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Cargo" titulo="Agregar Cargo" csrf="post" action="" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Nacionalidad" titulo="Agregar Nacionalidad" csrf="post" action="" colecciones="" keyColeccion="" />
    
@endsection
