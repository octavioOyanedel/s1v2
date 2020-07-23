<?php

namespace App\Http\Controllers;

use App\Renta;
use App\Traits\LogGenerico;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\RentaRequest;

class RentaController extends Controller
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
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function show(Renta $renta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function edit(Renta $renta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renta $renta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renta  $renta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renta $renta)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar crear interés via ajax.
     *
     * @param  Request $request
     * @return boolean
     */
    public function crearViaAjax(RentaRequest $request)
    {
        $this->createGenerico($request, new Renta);
        $renta = Renta::all()->last();
        if($request->ajax()){
            return response()->json($renta->id);
        }
    }   
}
