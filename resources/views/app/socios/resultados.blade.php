@extends('layouts.app')

@section('content')

    <!-- Tabla socios filtrados-->
	<x-tabla :coleccion="$coleccion" contenido="socios" titulo="Resultado Búsqueda Socios" alinear="text-center" :total="$total" ver="socios.show" editar="socios.edit" filtro="socios" actionFiltro="home" tituloModal="Eliminar Socio" actionModal="socios.destroy" textoModal="a este socio?. De ser así, seleccione una categoría para registrar motivo de desvinculación." :anexos="$anexos"/>

@endsection
