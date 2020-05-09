@extends('layouts.app')

@section('content')

    <!-- Tabla socios -->
	<x-tabla :coleccion="$coleccion" contenido="socios" titulo="Socios" alinear="text-center" :total="$total" ver="socios.show" editar="socios.edit" filtro="socios" actionFiltro="home" tituloModal="Eliminar Socio" actionModal="socios.destroy" textoModal="a este socio" />

@endsection
