@extends('layouts.app')

@section('content')

    <!-- formulario agregar abono -->
    <div class="contenedor-form">
        <x-form id="crear-abono-form" colecciones="" objetos="" alinear="text-center" metodo="POST" action="abonos.store" csrf="post" titulo="Agregar Abono" colorBoton="btn-primary" tituloBoton="Abonar" tamanoBoton="" largoBoton="btn-block" idBoton="agregar-abono" :extra="$prestamo"/>
    </div>

@endsection