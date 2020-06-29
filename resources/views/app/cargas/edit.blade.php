@extends('layouts.app')

@section('content')

    <!-- formulario editar carga -->
    <div class="contenedor-form">
        <x-form id="editar-carga-form" :colecciones="$colecciones" :objetos="$objetos" alinear="text-center" metodo="POST" action="cargas.update" csrf="put" titulo="Editar Carga Familiar" colorBoton="btn-primary" tituloBoton="Editar" tamanoBoton="" largoBoton="btn-block" idBoton="editar-carga" extra=""/>
    </div>

    <!-- Modal nuevo registro -->
    <x-modal-nuevo label="Parentesco" colecciones="" keyColeccion="" />
@endsection