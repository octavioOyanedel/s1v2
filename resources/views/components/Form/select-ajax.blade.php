<div>
	<!-- Select hijo -->
	<label for="{{ $id }}">{{ $label }}</label>			
	<select name="{{ $nombre }}" id="{{ $id }}" class="browser-default custom-select custom-select-sm mb-4" @if ($obligatorio === 'si') required="required" @endif>
		<option value="" selected>...</option>

	</select>
	@if ($keyObjeto != '')
		<input type="hidden" id="{{ $idEditar }}" value="{{ obtenerObjeto($objetos, $keyObjeto)[$nombre] }}">
	@endif	
	<input type="hidden" id="{{ $idOld }}" value="{{ old($nombre) }}">
</div>