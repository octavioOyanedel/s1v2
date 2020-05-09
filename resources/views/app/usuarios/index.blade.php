@extends('layouts.app')

@section('content')

    <!-- Tabla usuarios -->
	<x-tabla :coleccion="$coleccion" contenido="usuarios" titulo="Usuarios" alinear="text-center" :total="$total" ver="usuarios.show" editar="usuarios.edit" filtro="usuarios" actionFiltro="usuarios.index" tituloModal="Eliminar Usuario" actionModal="usuarios.destroy" textoModal="a este usuario" />
    
@endsection