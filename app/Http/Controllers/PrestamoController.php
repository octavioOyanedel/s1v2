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
    public function update(Request $request, Prestamo $prestamo)
    {
        $metodo_original = $prestamo->metodo_id;
        $metodo_nuevo = $request->metodo_id;

        if($metodo_original != $metodo_nuevo){

            // Cambio de DPP(1) a DEP(2)
            if($metodo_original == 1 && $metodo_nuevo == 2){
                // 1. Obtener total, sumar cuotas pagadas
                //$total = sumarCuotas($prestamo->id);
                // 2. Eliminar cuotas
                // 3. Modificar préstamo con nueva fecha de pago
            }
            // Cambio de DEP(2) a DPP(1)
            if($metodo_original == 2 && $metodo_nuevo == 1){
                // 1. Obtener total, sumar abonos
                $total = sumarAbonos($prestamo->id);
                // 2. Agregar cuotas
                // 3. Eliminar abonos
                // 4. Modificar préstamo con nuevas cuotas
            }
        }

        // Actualizar    
        // $request['fecha'] = formatoFecha($request->fecha);
        // $request['fecha_pago'] = formatoFecha($request->fecha_pago);
        // $this->updateGenerico($request, $prestamo);
        // return redirect('prestamos')->with('status', 'Préstamo Actualizado!');     
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
       
}
