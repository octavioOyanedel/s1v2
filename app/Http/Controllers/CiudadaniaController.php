<?php

namespace App\Http\Controllers;

use App\Ciudadania;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadaniaRequest;

class CiudadaniaController extends Controller
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
     * @param  \App\Ciudadania  $ciudadania
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudadania $ciudadania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudadania $ciudadania)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudadania  $ciudadania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudadania $ciudadania)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudadania $ciudadania)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar crear ciudadania via ajax.
     *
     * @param  Request $request
     * @return boolean
     */
    public function crearViaAjax(CiudadaniaRequest $request)
    {
        $this->createGenerico($request, new Ciudadania);
        $ciudadania = Ciudadania::all()->last();
        if($request->ajax()){
            return response()->json($ciudadania->id);
        }
    }       
}
