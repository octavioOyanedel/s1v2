<?php

namespace App\Http\Controllers;

use App\Urbe;
use Illuminate\Http\Request;
use App\Http\Requests\UrbeRequest;

class UrbeController extends Controller
{
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
     * @param  \App\Urbe  $urbe
     * @return \Illuminate\Http\Response
     */
    public function show(Urbe $urbe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Urbe  $urbe
     * @return \Illuminate\Http\Response
     */
    public function edit(Urbe $urbe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Urbe  $urbe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urbe $urbe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Urbe  $urbe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urbe $urbe)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar crear ciudad via ajax.
     *
     * @param  Request $request
     * @return boolean
     */
    public function crearViaAjax(UrbeRequest $request)
    {
        if($request->ajax()){

            return response()->json('ok');
        }
    }    
}
