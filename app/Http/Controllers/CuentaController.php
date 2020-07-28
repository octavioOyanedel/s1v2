<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Traits\LogGenerico;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\CuentaRequest;

class CuentaController extends Controller
{
    use CrudGenerico;
    use LogGenerico;        
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
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar crear cuenta via ajax.
     *
     * @param  Request $request
     * @return boolean
     */
    public function crearViaAjax(CuentaRequest $request)
    {
        $this->createGenerico($request, new Cuenta);
        $cuenta = Cuenta::all()->last();
        if($request->ajax()){
            return response()->json($cuenta->id);
        }
    }
}
