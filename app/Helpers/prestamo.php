<?php

use App\Abono;
use App\Prestamo;
use App\Cuota;

/**
 * Descripción: obtener formato moneda para visualización en tablas, agrega $ y puntos por unidad
 * Entrada/s: string nombre de enlace
 * Salida: string formateado $10.000
 */    
function formatoMoneda($valor)
{
    return '$'.number_format($valor, 0, 3, '.');
}

/**
 * Descripción: Sumar abonos
 * Entrada/s: id de préstamo
 * Salida: int suma
 */ 
function sumarAbonos($id)
{
    return Abono::sumarAbonos($id);
}

/**
 * Descripción: Obtener monto de préstamo
 * Entrada/s: id de préstamo
 * Salida: monto
 */ 
function obtenerMontoPrestamo($id)
{
	$prestamo = Prestamo::findOrFail($id);
	if ($prestamo) {
		return $prestamo->monto;
	}
    return 0;
}

/**
 * Descripción: Obtener cuotas de préstamo
 * Entrada/s: prestamo de tipo Prestamo
 * Salida: colección de cuotas
 */
function obtenerCuotasDePrestamo(Prestamo $prestamo)
{
    return Cuota::obtenerCuotasDePrestamo($prestamo);
}

/**
 * Descripción: Obtener estado
 * Entrada/s: prestamo de tipo Prestamo
 * Salida: string nombre estado
 */
function obtenerNombreEstado(Cuota $cuota)
{
    return Estado::obtenerNombreEstado($cuota);
}