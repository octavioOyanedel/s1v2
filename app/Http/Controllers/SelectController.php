<?php

namespace App\Http\Controllers;

use App\Area;
use App\Comuna;
use App\Titulo;
use App\Establecimiento;
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

    /**
     * Descripción: Obtener establecimientos que contienen nivel académico
     * Entrada/s: request
     * Salida: coleccion con establecimientos (instituciones)
     */
    public function establecimientos(Request $request)
    {
        if($request->ajax()){
            return response()->json(Establecimiento::where('grado_id','=',$request->grado_id)->pluck('id','nombre'));
        }
    }

    /**
     * Descripción: Obtener titulos dependientes de nivel académico (grados) e instituciones (establecimientos)
     * Entrada/s: request
     * Salida: coleccion con titulos
     */
    public function titulos(Request $request)
    {
        if($request->ajax()){
            return response()->json(Titulo::where(['grado_id','=',$request->grado_id,'establecimiento_id','=',$request->establecimiento_id])->pluck('id','nombre'));
        }
    }        
}
