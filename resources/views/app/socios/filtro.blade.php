@extends('layouts.app')

@section('content')

    <!-- formulario filtrar usuario -->
    <div class="contenedor-form">
        <x-form id="filtrar-socio-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="GET" action="filtrar_socios" csrf="" titulo="Búsqueda Filtrada Socio" colorBoton="btn-primary" tituloBoton="Buscar" tamanoBoton="" largoBoton="btn-block" idBoton="filtrar-socio"/>
    </div>
 
@endsection
