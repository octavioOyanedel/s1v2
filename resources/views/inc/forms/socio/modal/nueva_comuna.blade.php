<div class="alertas-nuevos alert alert-danger" role="alert"></div>

<label class="nueva-label" for="urbe-nueva-comuna">Ciudad <span title="Campo obligatorio.">*</span></label>
<select class="form-control form-control-sm mb-4" name="urbe_id" id="urbe-nueva-comuna" required>
	<option value="">...</option>
	@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item) 
		<option value="{{ $item->id }}">{{ $item->nombre }}</option>
	@endforeach
</select>

<label class="nueva-label" for="nueva-comuna">Comuna <span title="Campo obligatorio.">*</span></label>
<input id="nueva-comuna" name="nombre" type="text" class="nuevo-campo-input form-control form-control-sm" placeholder="Ej. Valparaíso" required>