<?php

namespace App\Http\Controllers;

use App\Parentesco;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\ParentescoRequest;

class ParentescoController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function show(Parentesco $parentesco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function edit(Parentesco $parentesco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parentesco $parentesco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parentesco  $parentesco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parentesco $parentesco)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar crear parentesco via ajax.
     *
     * @param  Request $request
     * @return boolean
     */
    public function crearViaAjax(ParentescoRequest $request)
    {
        $this->createGenerico($request, new Parentesco);
        $parentesco = Parentesco::all()->last();
        if($request->ajax()){
            return response()->json($parentesco->id);
        }
    }      
}
