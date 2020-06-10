@extends('layouts.app')

@section('content')

    <!-- formulario filtrar carga familiar -->
    <div class="contenedor-form">
        <x-form id="filtrar-carga-form" :colecciones="$colecciones" objetos="" alinear="text-center" metodo="GET" action="filtrar_cargas" csrf="get" titulo="Búsqueda Filtrada Carga Familiar" colorBoton="btn-primary" tituloBoton="Buscar" tamanoBoton="" largoBoton="btn-block" idBoton="filtrar-carga"/>
    </div>
 
@endsection
