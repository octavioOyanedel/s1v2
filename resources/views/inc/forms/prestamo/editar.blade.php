@php
    $prestamo = obtenerObjeto($objetos, 'prestamo');
@endphp

<form id="{{ $id }}" class="border border-light p-5" method="{{ $metodo }}" action="{{ route($action, $prestamo) }}">

	@include(obtenerCsrf($csrf))

	<p class="{{ $alinear }} h4 mb-4">{{ $titulo }}</p>

    <x-mensaje alerta="info" alinear="text-left" icono="alerta" mensaje="campos_obligatorio_rut" />
    
    <!-- Fecha solicitud -->
    <x-input label="Fecha Solicitud" tipo="text" nombre="fecha" id="fecha" margen="mb-4" tamano="form-control-sm" :valor="formatoFecha($prestamo->fecha)" placeholder="Ej. 01-01-2020" obligatorio="si"/>  

    <!-- # préstamo -->
    <x-input label="N° Préstamo" tipo="text" nombre="numero" id="numero" margen="mb-4" tamano="form-control-sm" :valor="$prestamo->numero" placeholder="Ej. 123" obligatorio="si"/>  

    {{-- Estados --}}
    <x-select :colecciones="$colecciones" keyColeccion="estados" :objetos="$objetos" keyObjeto="prestamo" label="Estado" nombre="estado_id" id="estado_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    {{-- Cuentas --}}
    <x-enlace-modal label="Cuenta" />
    <x-select :colecciones="$colecciones" keyColeccion="cuentas" :objetos="$objetos" keyObjeto="prestamo" label="Cuenta" nombre="cuenta_id" id="cuenta_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- # Cheque -->
    <x-input label="Cheque" tipo="text" nombre="cheque" id="cheque" margen="mb-4" tamano="form-control-sm" :valor="$prestamo->cheque" placeholder="Ej. 4455667788" obligatorio="si"/>  

    {{-- Interés --}}
    <x-enlace-modal label="Interés" />
    <x-select :colecciones="$colecciones" keyColeccion="rentas" :objetos="$objetos" keyObjeto="prestamo" label="Interés" nombre="renta_id" id="renta_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    <!-- Monto -->
    <x-input label="Monto" tipo="text" nombre="monto" id="monto" margen="mb-4" tamano="form-control-sm" :valor="$prestamo->monto" placeholder="Ej. 30000" obligatorio="si"/>  

    {{-- Métodos --}}
    <x-select :colecciones="$colecciones" keyColeccion="metodos" :objetos="$objetos" keyObjeto="prestamo" label="Método" nombre="metodo_id" id="metodo_id" tamano="custom-select-sm" obligatorio="si"  nuevo="si"/>

    {{-- Cuotas --}}
    <div id="">
        <x-select colecciones="" keyColeccion="" :objetos="$objetos" keyObjeto="prestamo" label="Cuotas" nombre="cuotas" id="cuotas" tamano="custom-select-sm" obligatorio="no"  nuevo="si"/>        
    </div>

    <!-- Fecha de pago -->    
    <div id="">
        <x-input label="Fecha de Pago" tipo="text" nombre="fecha_pago" id="fecha_pago" margen="mb-4" tamano="form-control-sm" :valor="formatoFecha($prestamo->fecha_pago)" placeholder="Ej. 01-01-2020" obligatorio="no"/>     
    </div>

    <!-- Botón -->
	<button class="btn {{ $colorBoton }} {{ $tamanoBoton }} {{ $largoBoton }} my-4" type="submit">{{ $tituloBoton }}</button>    	
		
</form>