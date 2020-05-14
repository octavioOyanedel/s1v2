<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Cargo;
use App\Socio;
use App\Comuna;
use App\Ciudadania;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use App\Http\Requests\SocioRequest;

class SocioController extends Controller
{
    use CrudGenerico;
    use BuscarGenerico;    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas = Comuna::orderBy('nombre','ASC')->get();
        $sedes = Sede::orderBy('nombre','ASC')->get();
        $cargos = Cargo::orderBy('nombre','ASC')->get();
        $ciudadanias = Ciudadania::orderBy('nombre','ASC')->get();
        $colecciones = array('comunas'=>$comunas,'sedes'=>$sedes,'cargos'=>$cargos,'ciudadanias'=>$ciudadanias);
        return view('app.socios.create', compact('colecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocioRequest $request)
    {
        // cambio de formato por datepicker
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $request['fecha_pucv'] = formatoFecha($request->fecha_pucv);
        $request['fecha_sind1'] = formatoFecha($request->fecha_sind1);
        $this->createGenerico($request, new Socio);
        return redirect('home')->with('status', 'Socio Creado!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socio $socio)
    {
        $this->deleteGenerico(Socio::findOrFail($socio->id));
        return redirect('home')->with('status', 'Socio Eliminado!');
    }
}
