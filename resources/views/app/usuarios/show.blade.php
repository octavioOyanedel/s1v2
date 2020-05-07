@extends('layouts.app')

@section('content')

    <!-- Tabla datos de usuario -->
    <x-tabla-mostrar :objeto="$objeto" alinear="text-center" titulo="Datos de Usuario" tabla="ver_usuario"/>

@endsection