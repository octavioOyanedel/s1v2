<?php

namespace App\Http\Controllers;

use App\Fase;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\FaseRequest;

class FaseController extends Controller
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
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function show(Fase $fase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function edit(Fase $fase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fase $fase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fase $fase)
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
    public function crearViaAjax(FaseRequest $request)
    {
        $this->createGenerico($request, new Fase);
        $fase = Fase::all()->last();
        if($request->ajax()){
            return response()->json($fase->id);
        }
    }     
}
