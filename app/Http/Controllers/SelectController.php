<?php

namespace App\Http\Controllers;

use App\Area;
use App\Urbe;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * Descripción: Obtener ciudades de una comuna
     * Entrada/s: request
     * Salida: coleccion con ciudades
     */
    public function ciudades(Request $request)
    {
        if($request->ajax()){
            return response()->json(Urbe::where('comuna_id','=',$request->id)->pluck('id','nombre'));
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
