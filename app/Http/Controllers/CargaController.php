<?php

namespace App\Http\Controllers;

use App\Carga;
use App\Socio;
use App\Parentesco;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\CargaRequest;
use App\Http\Requests\FiltroCargaRequest;

class CargaController extends Controller
{
    use CrudGenerico;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coleccion = Carga::orderBy('created_at','DESC')->paginate(10); 
        $total = $coleccion->total();
        return view('app.cargas.index', compact('coleccion', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $colecciones = array('parentescos'=>$parentescos,'socios'=>$socios);
        return view('app.cargas.create', compact('colecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargaRequest $request)
    {
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $this->createGenerico($request, new Carga);
        return redirect('home')->with('status', 'Carga Familiar Agregada!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function show(Carga $carga)
    {
        $objeto = $carga;
        return view('app.cargas.show', compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function edit(Carga $carga)
    {
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $colecciones = array('parentescos'=>$parentescos,'socios'=>$socios);
        $objetos = array('carga' => $carga);
        return view('app.cargas.edit', compact('colecciones','objetos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function update(CargaRequest $request, Carga $carga)
    {
        // cambio de formato por datepicker
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $this->updateGenerico($request, $carga);
        return redirect('cargas')->with('status', 'Carga Familiar Actualizada!');     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carga  $carga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carga $carga)
    {
        $this->deleteGenerico($carga);
        return redirect('cargas')->with('status', 'Carga Familiar Eliminada!');
    }

    /**
     * Show the form for filtrar socios.
     *
     * @return \Illuminate\Http\Response
     */
    public function formFiltro()
    {
        $parentescos = Parentesco::orderBy('nombre','ASC')->get();

        $hijos = new Parentesco; $hijos['id'] = -1; $hijos['nombre'] = 'Hijos (hijo/a)'; $parentescos->push($hijos);
        $padres = new Parentesco; $padres['id'] = -2; $padres['nombre'] = 'Padres (padre/madre)'; $parentescos->push($padres);
        $abuelos = new Parentesco; $abuelos['id'] = -3; $abuelos['nombre'] = 'Abuelos (abuelo/a)'; $parentescos->push($abuelos);                      
        $parentescos->push($hijos);
        $colecciones = array('parentescos'=>$parentescos);
        return view('app.cargas.filtro', compact('colecciones'));
    }

    /**
     * Busca cargas familiares.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtrarCargas(FiltroCargaRequest $request)
    {
        $coleccion = Carga::orderBy('apellido1','ASC')
            ->rangoFecha($request->fecha_nac_ini, $request->fecha_nac_fin, 'fecha_nac')
            ->rangoEdades($request->edad_ini, $request->edad_fin)
            ->generalAnd($request->parentesco_id,'parentesco_id')
            ->paginate(10)->appends([
            'fecha_nac_ini' => $request->fecha_nac_ini,
            'fecha_nac_fin' => $request->fecha_nac_fin,
            'edad_ini' => $request->edad_ini,
            'edad_fin' => $request->edad_fin,
            'parentesco_id' => $request->parentesco_id,
            ]);    
        $total = $coleccion->total();
        return view('app.cargas.resultados', compact('coleccion', 'total'));
    }
}
