@extends('layouts.app')

@section('content')

    <!-- Tabla datos de carga familiar -->
    <x-tabla-mostrar :objeto="$objeto" alinear="text-center" titulo="Datos de Carga Familiar" tabla="ver_carga"/>

@endsection