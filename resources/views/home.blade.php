@extends('layouts.app')

@section('content')

    <!-- Tabla socios -->
	<x-tabla coleccion="" contenido="socios" titulo="Socios" alinear="text-center" total="" ver="socios.show" editar="socios.edit"/>

@endsection
