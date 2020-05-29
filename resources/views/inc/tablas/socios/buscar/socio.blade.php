<tr>
	<td><span class="objeto-tipo"><i>Socio</i></span></td>
	<td><a href="{{ route('socios.show',$objeto->id) }}">{{ $objeto->nombre1 }} {{ $objeto->nombre2 }} {{ $objeto->apellido1 }} {{ $objeto->apellido2 }} - {{ formatoRut($objeto->rut) }}</a></td>
</tr>