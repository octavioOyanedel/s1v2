<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
