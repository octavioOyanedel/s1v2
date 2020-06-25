<div class="alertas-nuevos alert alert-danger" role="alert"></div>

<label class="nueva-label" for="grado-nuevo-titulo">Nivel académico <span title="Campo obligatorio.">*</span></label>
<select class="form-control form-control-sm mb-4" name="grado_id" id="grado-nuevo-titulo" required>
	<option value="">...</option>
	@foreach (obtenerColeccion($colecciones, $keyColeccion) as $item) 
		<option value="{{ $item->id }}">{{ $item->nombre }}</option>
	@endforeach
</select>

<label class="nueva-label" for="nuevo-titulo">Título <span title="Campo obligatorio.">*</span></label>
<input id="nuevo-titulo" name="nombre" type="text" class="nuevo-campo-input form-control form-control-sm" placeholder="Ej. Técnico en Enfermería" required>