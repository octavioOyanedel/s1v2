@extends('layouts.app')

@section('content')

    <!-- Tabla cargas -->
	<x-tabla :coleccion="$coleccion" contenido="cargas" titulo="Cargas Familiares" alinear="text-center" :total="$total" :anexos="$socio" />
    
@endsection