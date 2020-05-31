<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    @include('layouts.inc.mensajes.obligatorio')

    <!-- Estado categoría socio -->
    <x-select colecciones="" keyColeccion="" objetos="" keyObjeto="" label="Estado Socio" nombre="tipo_categoria" id="tipo_categoria" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- Motivo desvinculación -->
    <x-select :colecciones="$colecciones" keyColeccion="categorias" objetos="" keyObjeto="" label="Motivo Desvinculación" nombre="categoria_id" id="categoria_id" tamano="custom-select-sm" obligatorio="no"  nuevo="si"/>

    <!-- Rango fecha desvinculación -->
    <x-rango-fecha label="Fecha Desvinculación" inicio="fecha_desv_ini" fin="fecha_desv_fin"/>      

	<!-- Rango fecha ingreso sind1 -->
	<x-rango-fecha label="Fecha Ingreso Sind1" inicio="fecha_sind1_ini" fin="fecha_sind1_fin"/>

	<!-- Rango fecha nacimiento -->
	<x-rango-fecha label="Fecha de Nacimiento" inicio="fecha_nac_ini" fin="fecha_nac_fin"/>

    <!-- Rango fecha ingreso pucv -->
    <x-rango-fecha label="Fecha Ingreso PUCV" inicio="fecha_pucv_ini" fin="fecha_pucv_fin"/>      

    <!-- Género -->
    <x-select colecciones="" keyColeccion="" objetos="" keyObjeto="" label="Género" nombre="genero" id="genero" tamano="custom-select-sm" obligatorio="no"  nuevo="no"/>

    <!-- Ciudad -->
    <x-select :colecciones="$colecciones" keyColeccion="urbes" objetos="" keyObjeto="" label="Ciudad" nombre="urbe_id" id="urbe_id" tamano="custom-select-sm" obligatorio="no"  nuevo="si"/>

    <!-- Comuna -->
    <x-select-ajax keyObjeto="" objetos="" nombre="comuna_id" id="comuna_id" label="Comuna" idOld="old_comuna" idEditar="" obligatorio="no"/>

    <!-- Dirección -->
    <x-input label="Dirección" tipo="text" nombre="direccion" id="direccion" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Av. Brasil 2950" obligatorio="no"/>

    <!-- Nacionalidad -->
    <x-select :colecciones="$colecciones" keyColeccion="ciudadanias" objetos="" keyObjeto="" label="Nacionalidad" nombre="ciudadania_id" id="ciudadania_id" tamano="custom-select-sm" obligatorio="no" nuevo="si"/>    

    <!-- Sede -->
    <x-select :colecciones="$colecciones" keyColeccion="sedes" objetos="" keyObjeto="" label="Sede" nombre="sede_id" id="sede_id" tamano="custom-select-sm" obligatorio="no" nuevo="si"/>

    <!-- Área -->
    <x-select-ajax keyObjeto="" objetos="" nombre="area_id" id="area_id" label="Área" idOld="old_area" idEditar="" obligatorio="no"/>

    <!-- Cargo -->
    <x-select :colecciones="$colecciones" keyColeccion="cargos" objetos="" keyObjeto="" label="Cargo" nombre="cargo_id" id="cargo_id" tamano="custom-select-sm" obligatorio="no" nuevo="si"/>


    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>
