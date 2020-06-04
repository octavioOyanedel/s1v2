@extends('layouts.app')

@section('content')

    <!-- formulario agregar carga -->
    <div class="contenedor-form">
        <x-form id="crear-carga-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="POST" action="cargas.store" csrf="post" titulo="Agregar Carga Familiar" colorBoton="btn-primary" tituloBoton="Agregar" tamanoBoton="" largoBoton="btn-block" idBoton="agregar-carga"/>
    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Parentesco" colecciones="" keyColeccion="" />
@endsection