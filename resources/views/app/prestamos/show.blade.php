@extends('layouts.app')

@section('content')

    <!-- Tabla datos de prestamo -->
    <x-tabla-mostrar :objeto="$prestamo" alinear="text-center" titulo="Datos de Préstamo" tabla="ver_prestamo"/>
    
@endsection