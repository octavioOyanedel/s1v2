@extends('layouts.app')

@section('content')

    <!-- formulario agregar estudio realizado -->
    <div class="contenedor-form">
        <x-form id="crear-estudio-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="estudios.store" csrf="post" titulo="Agregar Estudio Realizado" colorBoton="btn-primary" tituloBoton="Agregar" tamanoBoton="" largoBoton="btn-block" idBoton="agregar-estudio" :extra="$socio"/>
    </div>

    <!-- Modal nuevo registro -->
	<x-modal-nuevo label="Nivel" colecciones="" keyColeccion="" />
	<x-modal-nuevo label="Estado" colecciones="" keyColeccion="" />
	<x-modal-nuevo label="Institución" :colecciones="$colecciones" keyColeccion="grados" />
	<x-modal-nuevo label="Título" :colecciones="$colecciones" keyColeccion="grados" />
@endsection