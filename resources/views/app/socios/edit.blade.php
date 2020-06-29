@extends('layouts.app')

@section('content')

    <!-- formulario editar socio -->
    <div class="contenedor-form">
        <x-form id="editar-socio-form" :colecciones="$colecciones" :objetos="$objetos" alinear="text-center" metodo="POST" action="socios.update" csrf="put" titulo="Editar Socio" colorBoton="btn-primary" tituloBoton="Editar" tamanoBoton="" largoBoton="btn-block" idBoton="editar-socio" extra=""/>
    </div>
    
    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Ciudad" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Sede" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Cargo" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Nacionalidad" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Comuna" :colecciones="$colecciones" keyColeccion="urbes" />
    <x-modal-nuevo label="Área" :colecciones="$colecciones" keyColeccion="sedes" />    
@endsection