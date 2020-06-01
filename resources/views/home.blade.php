@extends('layouts.app')

@section('content')

    <!-- Tabla socios -->
	<x-tabla :coleccion="$coleccion" contenido="socios" titulo="Socios" alinear="text-center" :total="$total" :anexos="$anexos"/>

@endsection
