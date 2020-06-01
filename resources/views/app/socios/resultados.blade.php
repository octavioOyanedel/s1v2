@extends('layouts.app')

@section('content')

    <!-- Tabla socios filtrados-->
	<x-tabla :coleccion="$coleccion" contenido="socios" titulo="Resultado Búsqueda Socios" alinear="text-center" :total="$total" :anexos="$anexos"/>

@endsection
