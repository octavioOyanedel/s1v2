@extends('layouts.app')

@section('content')

    <!-- Tabla datos de usuario -->
    <x-tabla-mostrar :objeto="$socio" alinear="text-center" titulo="Datos de Socio" tabla="ver_socio"/>
    
@endsection