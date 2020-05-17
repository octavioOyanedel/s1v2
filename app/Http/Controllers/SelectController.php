<?php

namespace App\Http\Controllers;

use App\Area;
use App\Comuna;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * Descripción: Obtener comunas de una comuna
     * Entrada/s: request
     * Salida: coleccion con comunas
     */
    public function comunas(Request $request)
    {
        if($request->ajax()){
            return response()->json(Comuna::where('urbe_id','=',$request->id)->pluck('id','nombre'));
        }
    }

    /**
     * Descripción: Obtener areas de una sede
     * Entrada/s: request
     * Salida: coleccion con areas
     */
    public function areas(Request $request)
    {
        if($request->ajax()){
            return response()->json(Area::where('sede_id','=',$request->id)->pluck('id','nombre'));
        }
    } 
}
