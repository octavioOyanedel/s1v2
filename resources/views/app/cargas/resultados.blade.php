@extends('layouts.app')

@section('content')

    <!-- Tabla cargas familiares cargadas-->
	<x-tabla :coleccion="$coleccion" contenido="cargas" titulo="Resultado Búsqueda Cargas Familiares" alinear="text-center" :total="$total" anexos=""/>

@endsection
