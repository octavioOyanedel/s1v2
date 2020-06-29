@extends('layouts.app')

@section('content')

    <!-- Tabla datos de estudio realizado -->
    <x-tabla-mostrar :objeto="$objeto" alinear="text-center" titulo="Datos de Estudio Realizado" tabla="ver_estudio"/>

@endsection