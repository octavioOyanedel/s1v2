@extends('layouts.app')

@section('content')

    <!-- formulario editar estudio realizado -->
    <div class="contenedor-form">
        <x-form id="editar-estudio-form" :colecciones="$colecciones" :objetos="$objetos" alinear="text-center" metodo="POST" action="estudios.update" csrf="put" titulo="Editar Estudio Realizado" colorBoton="btn-primary" tituloBoton="Editar" tamanoBoton="" largoBoton="btn-block" idBoton="editar-estudio" extra=""/>
    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Nivel" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Estado" colecciones="" keyColeccion="" />
    <x-modal-nuevo label="Institución" :colecciones="$colecciones" keyColeccion="grados" />
    <x-modal-nuevo label="Título" :colecciones="$colecciones" keyColeccion="grados" />
@endsection