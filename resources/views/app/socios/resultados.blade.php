@extends('layouts.app')

@section('content')

    <!-- Tabla socios filtrados-->
	<x-tabla :coleccion="$coleccion" contenido="socios" titulo="Resultado Búsqueda Socios" alinear="text-center" :total="$total" ver="socios.show" editar="socios.edit" filtro="" actionFiltro="" tituloModal="Reincorporar Socio" actionModal="reincorporar" textoModal="" anexos=""/>

@endsection
