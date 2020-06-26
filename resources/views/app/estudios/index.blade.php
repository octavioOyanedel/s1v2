@extends('layouts.app')

@section('content')

    <!-- Tabla estudios -->
	<x-tabla :coleccion="$coleccion" contenido="estudios" titulo="Estudios Realizados" alinear="text-center" :total="$total" anexos="" />
    
@endsection