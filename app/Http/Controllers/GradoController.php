<?php

namespace App\Http\Controllers;

use App\Grado;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\GradoRequest;

class GradoController extends Controller
{
    use CrudGenerico;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar crear cargo via ajax.
     *
     * @param  Request $request
     * @return boolean
     */
    public function crearViaAjax(GradoRequest $request)
    {
        $this->createGenerico($request, new Grado);
        $grado = Grado::all()->last();
        if($request->ajax()){
            return response()->json($grado->id);
        }
    }         
}
