@php
    $socio = obtenerObjeto($objetos, 'socio');
@endphp

<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action, $socio) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio" />

    <!-- Rut -->
    <x-input label="Rut" tipo="text" nombre="rut" id="rut" margen="mb-4" tamano="form-control-sm" :valor="$socio->rut" placeholder="Ej. 11222333k" obligatorio="si"/>

    <!-- # socio -->
    <x-input label="N° Socio" tipo="text" nombre="numero" id="numero" margen="mb-4" tamano="form-control-sm" :valor="$socio->numero" placeholder="Ej. 123" obligatorio="si"/>    

	<!-- Primer nombre -->
	<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" :valor="$socio->nombre1" placeholder="Ej. Juan" obligatorio="si"/>

    <!-- Segundo nombre -->
    <x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" :valor="$socio->nombre2" placeholder="Ej. Diego" obligatorio="no"/>

    <!-- Apellido paterno -->
    <x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" :valor="$socio->apellido1" placeholder="Ej. Soto" obligatorio="si"/>

    <!-- Apellido materno -->
    <x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" :valor="$socio->apellido2" placeholder="Ej. Pérez" obligatorio="no"/>    

    <!-- Género -->
    <x-select colecciones="" keyColeccion="" :objetos="$objetos" keyObjeto="socio" label="Género" nombre="genero" id="genero" tamano="custom-select-sm" obligatorio="si" nuevo="no"/>

    <!-- Fecha nacimiento -->
    <x-input label="Fecha Nacimiento" tipo="text" nombre="fecha_nac" id="fecha_nac" margen="mb-4" tamano="form-control-sm" :valor="formatoFecha($socio->fecha_nac)" placeholder="Ej. 01-01-2020" obligatorio="no"/> 

    <!-- Contacto -->
    <x-input label="N° Contacto" tipo="text" nombre="celular" id="celular" margen="mb-4" tamano="form-control-sm" :valor="$socio->celular" placeholder="Ej. 911223344" obligatorio="no"/>         

    <!-- Correo -->
    <x-input label="Correo" tipo="email" nombre="correo" id="correo" margen="mb-4" tamano="form-control-sm" :valor="$socio->correo" placeholder="Ej. correo@pucv.cl" obligatorio="no"/>  

    <!-- Fecha pucv -->
    <x-input label="Fecha PUCV" tipo="text" nombre="fecha_pucv" id="fecha_pucv" margen="mb-4" tamano="form-control-sm" :valor="formatoFecha($socio->fecha_pucv)" placeholder="Ej. 01-01-2020" obligatorio="no"/> 

    <!-- Anexo -->
    <x-input label="Anexo" tipo="text" nombre="anexo" id="anexo" margen="mb-4" tamano="form-control-sm" :valor="$socio->anexo" placeholder="Ej. 3093" obligatorio="no"/>

    <!-- Fecha sind1 -->
    <x-input label="Fecha SIND1" tipo="text" nombre="fecha_sind1" id="fecha_sind1" margen="mb-4" tamano="form-control-sm" :valor="formatoFecha($socio->fecha_sind1)" placeholder="Ej. 01-01-2020" obligatorio="no"/>     

    <!-- Ciudad -->
    <x-enlace-modal label="Ciudad" />
    <x-select :colecciones="$colecciones" keyColeccion="urbes" :objetos="$objetos" keyObjeto="socio" label="Ciudad" nombre="urbe_id" id="urbe_id" tamano="custom-select-sm" obligatorio="si" nuevo="si"/>

    <!-- Comuna -->
    <x-enlace-modal label="Comuna" />
    <x-select-ajax keyObjeto="socio" :objetos="$objetos" nombre="comuna_id" id="comuna_id" label="Comuna" idOld="old_comuna" idEditar="editar_comuna" obligatorio="si"/>

    <!-- Dirección -->
    <x-input label="Dirección" tipo="text" nombre="direccion" id="direccion" margen="mb-4" tamano="form-control-sm" :valor="$socio->direccion" placeholder="Ej. Av. Brasil 2950" obligatorio="no"/>

    <!-- Sede -->
    <x-enlace-modal label="Sede" />
    <x-select :colecciones="$colecciones" keyColeccion="sedes" :objetos="$objetos" keyObjeto="socio" label="Sede" nombre="sede_id" id="sede_id" tamano="custom-select-sm" obligatorio="si" nuevo="si"/>    

    <!-- Área -->
    <x-enlace-modal label="Área" />
    <x-select-ajax keyObjeto="socio" :objetos="$objetos" nombre="area_id" id="area_id" label="Área" idOld="old_area" idEditar="editar_area" obligatorio="si"/>

    <!-- Cargo -->
    <x-enlace-modal label="Cargo" />
    <x-select :colecciones="$colecciones" keyColeccion="cargos" :objetos="$objetos" keyObjeto="socio" label="Cargo" nombre="cargo_id" id="cargo_id" tamano="custom-select-sm" obligatorio="si" nuevo="si"/>

    <!-- Nacionalidad -->
    <x-enlace-modal label="Nacionalidad" />
    <x-select :colecciones="$colecciones" keyColeccion="ciudadanias" :objetos="$objetos" keyObjeto="socio" label="Nacionalidad" nombre="ciudadania_id" id="ciudadania_id" tamano="custom-select-sm" obligatorio="si" nuevo="si"/>       

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>