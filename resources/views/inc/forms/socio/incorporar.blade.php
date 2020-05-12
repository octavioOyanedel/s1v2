<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    @include('layouts.inc.mensajes.obligatorio')

    <!-- Rut -->
    <x-input label="Rut" tipo="text" nombre="rut" id="rut" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 11222333k" obligatorio="si"/>

    <!-- # socio -->
    <x-input label="N° Socio" tipo="text" nombre="numero" id="numero" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 123" obligatorio="si"/>    

	<!-- Primer nombre -->
	<x-input label="Primer Nombre" tipo="text" nombre="nombre1" id="nombre1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Juan" obligatorio="si"/>

    <!-- Segundo nombre -->
    <x-input label="Segundo Nombre" tipo="text" nombre="nombre2" id="nombre2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Diego" obligatorio="no"/>

    <!-- Apellido paterno -->
    <x-input label="Apellido Paterno" tipo="text" nombre="apellido1" id="apellido1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Soto" obligatorio="si"/>

    <!-- Apellido materno -->
    <x-input label="Apellido Materno" tipo="text" nombre="apellido2" id="apellido2" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Pérez" obligatorio="no"/>    

    <!-- Género -->
    <x-select colecciones="" keyColeccion="" objetos="" keyObjeto="" label="Género" nombre="genero" id="genero" tamano="custom-select-sm" obligatorio="si"/>

    <!-- Fecha nacimiento -->
    <x-input label="Fecha Nacimiento" tipo="date" nombre="fecha_nac" id="fecha_nac" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 01-01-2020" obligatorio="no"/> 

    <!-- Contacto -->
    <x-input label="N° Contacto" tipo="text" nombre="celular" id="celular" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 911223344" obligatorio="no"/>         

    <!-- Correo -->
    <x-input label="Correo" tipo="email" nombre="correo" id="correo" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. correo@pucv.cl" obligatorio="no"/>  

    <!-- Fecha nacimiento -->
    <x-input label="Fecha PUCV" tipo="date" nombre="fecha_pucv" id="fecha_pucv" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 01-01-2020" obligatorio="no"/> 

    <!-- Anexo -->
    <x-input label="Anexo" tipo="text" nombre="anexo" id="anexo" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 3093" obligatorio="no"/>

    <!-- Fecha sind1 -->
    <x-input label="Fecha SIND1" tipo="date" nombre="fecha_sind1" id="fecha_sind1" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. 01-01-2020" obligatorio="no"/>     

    <!-- Ciudad -->
    <x-select :colecciones="$colecciones" keyColeccion="comunas" objetos="" keyObjeto="" label="Ciudad" nombre="comuna_id" id="comuna_id" tamano="custom-select-sm" obligatorio="no"/>

    <!-- Comuna -->
    <x-select colecciones="" keyColeccion="" objetos="" keyObjeto="" label="Comuna" nombre="urbe_id" id="urbe_id" tamano="custom-select-sm" obligatorio="si"/>

    <!-- Dirección -->
    <x-input label="Dirección" tipo="text" nombre="direccion" id="direccion" margen="mb-4" tamano="form-control-sm" valor="" placeholder="Ej. Av. Brasil 2950" obligatorio="no"/>

    <!-- Sede -->
    <x-select :colecciones="$colecciones" keyColeccion="sedes" objetos="" keyObjeto="" label="Sede" nombre="sede_id" id="sede_id" tamano="custom-select-sm" obligatorio="si"/>    

    <!-- Área -->
    <x-select colecciones="" keyColeccion="" objetos="" keyObjeto="" label="Área" nombre="area_id" id="area_id" tamano="custom-select-sm" obligatorio="no"/>

    <!-- Cargo -->
    <x-select :colecciones="$colecciones" keyColeccion="cargos" objetos="" keyObjeto="" label="Cargo" nombre="cargo_id" id="cargo_id" tamano="custom-select-sm" obligatorio="si"/>

    <!-- Nacionalidad -->
    <x-select :colecciones="$colecciones" keyColeccion="ciudadanias" objetos="" keyObjeto="" label="Nacionalidad" nombre="ciudadania_id" id="ciudadania_id" tamano="custom-select-sm" obligatorio="si"/>       

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
  			
</form>