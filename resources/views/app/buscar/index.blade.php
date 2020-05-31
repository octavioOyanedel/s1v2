@extends('layouts.app')

@section('content')

	
	<div class="contenedor-form">

		<p class="text-center h4 mb-4">
			@if (count($coleccion) > 0)
				{{ $total }} 
			@endif

			@if ($total > 1)
				Resultados,
			@else
				Resultado,
			@endif 			
			búsqueda: <i>"{{ $q }}"</i>
		</p>

		@if (count($coleccion) > 0)	
			<div class="table-responsive">
				<table class="table">
				@foreach ($coleccion as $objeto)
					@switch($objeto)
					    @case($objeto instanceof App\Socio)
							@include('inc.tablas.socios.buscar.socio')
					    @break		
					@endswitch				
				@endforeach			
				</table>
			</div>
			<!-- Paginación -->
			<div class="paginacion mt-4">

			</div>
		@else
			@include('layouts.inc.mensajes.busqueda')
		@endif

	</div>

@endsection
