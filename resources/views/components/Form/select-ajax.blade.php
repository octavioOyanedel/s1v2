<div>
	<!-- label obligatorio -->
	@error($nombre)
	    <div class="error-login alert alert-danger alerta-forms" role="alert">
	        {{ $message }}
	    </div>
	@else
		@if($label != 'no' && $obligatorio === 'si')
			<label for="{{ $id }}">{{ $label }} <span title="Campo obligatorio.">*</span></label>
		@else
			<label for="{{ $id }}">{{ $label }}</label>
		@endif	   
	@enderror
			
	<select name="{{ $nombre }}" id="{{ $id }}" class="browser-default custom-select custom-select-sm mb-4" @if ($obligatorio === 'si') required="required" @endif>
		<option value="" selected>...</option>

	</select>
	@if ($keyObjeto != '')
		<input type="hidden" id="{{ $idEditar }}" value="{{ obtenerObjeto($objetos, $keyObjeto)[$nombre] }}">
	@endif	
	<input type="hidden" id="{{ $idOld }}" value="{{ old($nombre) }}">
</div>