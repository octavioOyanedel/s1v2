@extends('layouts.app')

@section('content')

    <!-- formulario crear usuario -->
    <div class="contenedor-form">
        <x-form id="crear-socio-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="socios.store" csrf="post" titulo="Incorporar Socio" colorBoton="btn-primary" tituloBoton="Incorporar" tamanoBoton="" largoBoton="btn-block" idBoton="incorporar-socio"/>

    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Ciudad" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Sede" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Cargo" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Nacionalidad" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Comuna" :colecciones="$colecciones" keyColeccion="urbes" />
    <x-modal-nuevo label="Área" :colecciones="$colecciones" keyColeccion="sedes" />  
@endsection
