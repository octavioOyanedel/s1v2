<div>

@error($nombre)
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
@else
	@if($label != 'no')
			@if($obligatorio === 'si')
				<label for="{{ $id }}">{{ $label }} <span title="Campo obligatorio.">*</span></label>
			@else
				<label for="{{ $id }}">{{ $label }}</label>
			@endif	
	@endif
@enderror

<input type="{{ $tipo }}" name="{{ $nombre }}" id="{{ $id }}" class="form-control {{ $margen }} {{ $tamano }} @error($nombre) is-invalid @enderror" placeholder="{{ $placeholder }}" value="{{ obtenerValorInput(old($nombre), $valor) }}" @if ($obligatorio === 'si') required @endif />
</div>