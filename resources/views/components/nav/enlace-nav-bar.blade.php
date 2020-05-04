<div>
	<!-- Dropdown usuario logeado-->
	<li class="nav-item dropdown {{ esActive(request()->path(), $titulo) }}">
		
		<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			@if($titulo === 'usuario')
				Hola,  {{ Auth::user()->nombre1 }}
			@else
				{{ ucfirst($titulo)}}
			@endif			
		</a>

		<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

			@foreach (obtenerEnlacesNav($titulo) as $nombre => $ruta)

				@switch($nombre)
				    @case('Salir')
						<a class="dropdown-item" href="{{ route($ruta) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ $nombre }}</a>
						<form id="logout-form" action="{{ route($ruta) }}" method="POST" style="display: none;">
							@csrf
						</form>
				    @break
					@case('Editar usuario')
						<a class="dropdown-item" href="{{ route($ruta, Auth::user()->id) }}">{{ $nombre }}</a>
					@break
				    @default
				    	<a class="dropdown-item" href="{{ route($ruta) }}">{{ $nombre }}</a>
				@endswitch

			@endforeach

		</div>		
	</li>
</div>