@extends('layouts.app')

@section('content')

	<p class="text-center h4 mb-4">Resultados Búsqueda: <i>{{ $general }}</i></p>

	@if (count($coleccion) > 0)
		


		<!-- Paginación -->
		<div class="paginacion mt-4">
				
		</div>
	@else
		@include('layouts.inc.mensajes.busqueda')
	@endif



@endsection
