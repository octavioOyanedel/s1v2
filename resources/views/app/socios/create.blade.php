@extends('layouts.app')

@section('content')

    <!-- formulario crear usuario -->
    <div class="contenedor-form">
        <x-form id="crear-socio-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="socios.store" csrf="post" titulo="Incorporar Socio" colorBoton="btn-primary" tituloBoton="Incorporar" tamanoBoton="" largoBoton="btn-block" idBoton="incorporar-socio"/>

    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Ciudad" action="home" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Sede" action="home" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Cargo" action="home" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Nacionalidad" action="home" colecciones="" keyColeccion="" />
    
@endsection
