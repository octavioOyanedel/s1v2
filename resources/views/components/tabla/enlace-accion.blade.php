<div>
	@switch($titulo)
	    @case('No habilitado, antes reincorporar.')
			<a title="{{ $titulo }}" class="p-2 {{ $color }}" >
				<i class="fas {{ $icono }}"></i>
			</a>
	    @break	
	    @case('Eliminar')
			<a title="{{ $titulo }}" class="p-2 {{ $color }}" data-toggle="modal" data-target="#ventanaModal{{ $id }}">
				<i class="fas {{ $icono }}"></i>
			</a>
	    @break
	    @case('Reincorporar')
			<a title="{{ $titulo }}" class="p-2 {{ $color }}" data-toggle="modal" data-target="#ventanaModal{{ $id }}">
				<i class="fas {{ $icono }}"></i>
			</a>
	    @break	    
	    @default
			<a title="{{ $titulo }}" class="p-2 {{ $color }}" href="{{ route($ruta ,$id) }}">
				<i class="fas {{ $icono }}"></i>
			</a>
	@endswitch
	
</div>

	