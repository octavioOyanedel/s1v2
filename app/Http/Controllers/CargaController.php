<?php

namespace App\Http\Controllers;

use App\Carga;
use App\Socio;
use App\Parentesco;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\CargaRequest;

class CargaController extends Controller
{
    use CrudGenerico;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('index cargas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $colecciones = array('parentescos'=>$parentescos,'socios'=>$socios);
        return view('app.cargas.create', compact('colecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargaRequest $request)
    {
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $this->createGenerico($request, new Carga);
        return redirect('home')->with('status', 'Carga Familiar Agregada!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function show(Carga $carga)
    {
        $objeto = $carga;
        return view('app.cargas.show', compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function edit(Carga $carga)
    {
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $colecciones = array('parentescos'=>$parentescos,'socios'=>$socios);
        $objetos = array('carga' => $carga);
        return view('app.cargas.edit', compact('colecciones','objetos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function update(CargaRequest $request, Carga $carga)
    {
        // cambio de formato por datepicker
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $this->updateGenerico($request, $carga);
        return redirect('home')->with('status', 'Carga Familiar Actualizada!');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga $carga)
    {
        $this->deleteGenerico($carga);
        return redirect('home')->with('status', 'Carga Familiar Eliminada!');
    }
}
