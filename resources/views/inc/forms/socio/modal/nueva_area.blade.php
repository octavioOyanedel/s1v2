<div class="alertas-nuevos alert alert-danger" role="alert"></div>

<label class="nueva-label" for="sede-nueva-area">Sede <span title="Campo obligatorio.">*</span></label>
<select class="form-control form-control-sm mb-4" name="sede_id" id="sede-nueva-area" required>
	<option value="">...</option>
	@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item) 
		<option value="{{ $item->id }}">{{ $item->nombre }}</option>
	@endforeach
</select>

<label class="nueva-label" for="nueva-area">Área <span title="Campo obligatorio.">*</span></label>
<input id="nueva-area" name="nombre" type="text" class="nuevo-campo-input form-control form-control-sm" placeholder="Ej. DSIC" required>