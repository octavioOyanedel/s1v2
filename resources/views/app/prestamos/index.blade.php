@extends('layouts.app')

@section('content')

    <!-- Tabla préstamos -->
	<x-tabla :coleccion="$coleccion" contenido="prestamos" titulo="Préstamos" alinear="text-center" :total="$total" anexos="" />
    
@endsection