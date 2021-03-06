<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Cuota;
use App\Renta;
use App\Socio;
use App\Cuenta;
use App\Estado;
use App\Metodo;
use App\Prestamo;
use App\Traits\LogGenerico;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use App\Http\Requests\RentaRequest;
use App\Http\Requests\PrestamoRequest;

class PrestamoController extends Controller
{
    use CrudGenerico;
    use LogGenerico;
    use BuscarGenerico;  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coleccion = Prestamo::orderBy('updated_at','DESC')->paginate(10); 
        $total = $coleccion->total();
        return view('app.prestamos.index', compact('coleccion', 'total'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentas = Cuenta::orderBy('numero','ASC')->get();
        $metodos = Metodo::orderBy('nombre','ASC')->get();
        $rentas = Renta::orderBy('cantidad','ASC')->get();
        $estados = Estado::orderBy('nombre','ASC')->get();
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $colecciones = array('cuentas'=>$cuentas,'metodos'=>$metodos,'rentas'=>$rentas,'estados'=>$estados,'socios'=>$socios);
        return view('app.prestamos.create', compact('colecciones'));       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestamoRequest $request)
    {
        $request['fecha'] = formatoFecha($request->fecha);
        if($request['fecha_pago'] != null){
            $request['fecha_pago'] = formatoFecha($request->fecha_pago);
        }      
        $this->createGenerico($request, new Prestamo);
        return redirect('prestamos')->with('status', 'Préstamo Registrado!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        return view('app.prestamos.show', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        $cuentas = Cuenta::orderBy('numero','ASC')->get();
        $metodos = Metodo::orderBy('nombre','ASC')->get();
        $rentas = Renta::orderBy('cantidad','ASC')->get();
        $estados = Estado::orderBy('nombre','ASC')->get();
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $objetos = array('prestamo' => $prestamo);
        $colecciones = array('cuentas'=>$cuentas,'metodos'=>$metodos,'rentas'=>$rentas,'estados'=>$estados,'socios'=>$socios);
        return view('app.prestamos.edit', compact('colecciones','objetos'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(PrestamoRequest $request, Prestamo $prestamo)
    {

        $request['fecha'] = formatoFecha($request->fecha);
        if($request['fecha_pago'] != null){
            $request['fecha_pago'] = formatoFecha($request->fecha_pago);
        }      
        // Caso 1 préstamo con cambio de método de pago DPP (1) -> DEP (2) o DEP (2) -> DPP (1) rehacer préstamo con nuevos parámetros 
        if($prestamo->metodo_id != $request->metodo_id){
            // DPP (1) -> DEP (2)
            if($prestamo->metodo_id == 1 && $request->metodo_id == 2){
                $request['monto'] = $prestamo->monto - Cuota::sumarCuotasPagadas($prestamo);
                Cuota::eliminarCuotasPrestamo($prestamo);
            }else{ // DEP (2) -> DPP (1)
                $request['monto'] = $prestamo->monto - sumarAbonos($prestamo->id);
                Abono::eliminarAbonosPrestamo($prestamo);
            }
        }
        $this->createGenerico($request, new Prestamo);
        Prestamo::eliminarPrestamo($prestamo);
        return redirect('prestamos')->with('status', 'Préstamo Actualizado!');     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        $this->deleteGenerico(Prestamo::findOrFail($prestamo->id));
        return redirect('prestamos')->with('status', 'Préstamo Eliminado!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function abonar(Prestamo $prestamo)
    {
        $this->deleteGenerico(Prestamo::findOrFail($prestamo->id));
        return redirect('prestamos')->with('status', 'Préstamo Eliminado!');
    }    
       
}
