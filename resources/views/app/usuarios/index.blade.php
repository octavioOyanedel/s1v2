@extends('layouts.app')

@section('content')

    <!-- Tabla usuarios -->
	<x-tabla :coleccion="$coleccion" contenido="usuarios" titulo="Usuarios" alinear="text-center" :total="$total" anexos="" />
    
@endsection