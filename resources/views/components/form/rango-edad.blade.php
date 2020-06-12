<div>
@error('edad_ini')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
@else
	<label for="">{{ $label }}</label>
@enderror	
   
    <div class="input-daterange input-group mb-4">
        <input type="text" class="input-sm form-control form-control-sm" name="{{ $inicio }}" id="{{ $inicio }}" placeholder="Edad inicial"/>
        <span class="input-group-addon ml-2 mr-2">a</span>
        <input type="text" class="input-sm form-control form-control-sm" name="{{ $fin }}" id="{{ $fin }}" placeholder="Edad final"/>
    </div>
</div>