<tr>
	<td><span class="objeto-tipo"><i>Socio</i></span></td>
	<td>
		@if ($objeto instanceof App\Socio && $objeto->categoria_id != 1)
			<a title="Ver" class="p-2 text-primary" href="{{ route('mostrar_desvinculado',['id'=>$objeto->id]) }}">
				{{ $objeto->nombre1 }} {{ $objeto->nombre2 }} {{ $objeto->apellido1 }} {{ $objeto->apellido2 }} - {{ formatoRut($objeto->rut) }}
			</a>	
		@else
			<a title="Ver" class="p-2 text-primary" href="{{ route('socios.show',$objeto->id) }}">
				{{ $objeto->nombre1 }} {{ $objeto->nombre2 }} {{ $objeto->apellido1 }} {{ $objeto->apellido2 }} - {{ formatoRut($objeto->rut) }}
			</a>								
		@endif
	</td>
</tr>