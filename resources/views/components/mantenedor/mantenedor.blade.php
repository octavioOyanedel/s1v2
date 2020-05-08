<div>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item" title="Mantenedor"><i class="text-primary fas fa-cog"></i></li>
			@foreach (obtenerEnlacesMantenedor(Request()->path()) as $nombre => $ruta)
				<li class="breadcrumb-item"><a href="{{ route($ruta) }}">{{ $nombre }}</a></li>
			@endforeach
		</ol>
	</nav>
</div>