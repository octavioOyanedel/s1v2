<div class="alertas-nuevos alert alert-danger" role="alert"></div>

<label class="nueva-label" for="grado-nuevo-establecimiento">Nivel académico <span title="Campo obligatorio.">*</span></label>
<select class="form-control form-control-sm mb-4" name="grado_id" id="grado-nuevo-establecimiento" required>
	<option value="">...</option>
	@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item) 
		<option value="{{ $item->id }}">{{ $item->nombre }}</option>
	@endforeach
</select>

<label class="nueva-label" for="nuevo-establecimiento">Institución <span title="Campo obligatorio.">*</span></label>
<input id="nuevo-establecimiento" name="nombre" type="text" class="nuevo-campo-input form-control form-control-sm" placeholder="Ej. PUCV" required>