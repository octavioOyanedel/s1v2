<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Urbe;
use App\Cargo;
use App\Socio;
use App\Categoria;
use App\Ciudadania;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use App\Http\Requests\SocioRequest;
use App\Http\Requests\FiltroSocioRequest;

class SocioController extends Controller
{
    use CrudGenerico;
    use BuscarGenerico;    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urbes = Urbe::orderBy('nombre','ASC')->get();
        $sedes = Sede::orderBy('nombre','ASC')->get();
        $cargos = Cargo::orderBy('nombre','ASC')->get();
        $ciudadanias = Ciudadania::orderBy('nombre','ASC')->get();
        $colecciones = array('urbes'=>$urbes,'sedes'=>$sedes,'cargos'=>$cargos,'ciudadanias'=>$ciudadanias);
        return view('app.socios.create', compact('colecciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocioRequest $request)
    {
        // cambio de formato por datepicker
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $request['fecha_pucv'] = formatoFecha($request->fecha_pucv);
        $request['fecha_sind1'] = formatoFecha($request->fecha_sind1);
        $this->createGenerico($request, new Socio);
        return redirect('home')->with('status', 'Socio Creado!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {
        return view('app.socios.show', compact('socio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {
        $urbes = Urbe::orderBy('nombre','ASC')->get();
        $sedes = Sede::orderBy('nombre','ASC')->get();
        $cargos = Cargo::orderBy('nombre','ASC')->get();
        $ciudadanias = Ciudadania::orderBy('nombre','ASC')->get();
        $objetos = array('socio' => $socio);
        $colecciones = array('urbes'=>$urbes,'sedes'=>$sedes,'cargos'=>$cargos,'ciudadanias'=>$ciudadanias);
        return view('app.socios.edit', compact('colecciones','objetos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function update(SocioRequest $request, Socio $socio)
    {
        // cambio de formato por datepicker
        $request['fecha_nac'] = formatoFecha($request->fecha_nac);
        $request['fecha_pucv'] = formatoFecha($request->fecha_pucv);
        $request['fecha_sind1'] = formatoFecha($request->fecha_sind1);
        $this->updateGenerico($request, $socio);
        return redirect('home')->with('status', 'Socio Actualizado!');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Socio $socio)
    {
        // modificar categoria antes del softdelete
        $socio = Socio::findOrFail($socio->id);
        $socio->categoria_id = $request->categoria_id;
        $socio->update();        
        $this->deleteGenerico(Socio::findOrFail($socio->id));
        return redirect('home')->with('status', 'Socio Eliminado!');
    }

    /**
     * Show the form for filtrar socios.
     *
     * @return \Illuminate\Http\Response
     */
    public function formFiltro()
    {
        $urbes = Urbe::orderBy('nombre','ASC')->get();
        $sedes = Sede::orderBy('nombre','ASC')->get();
        $cargos = Cargo::orderBy('nombre','ASC')->get();
        $ciudadanias = Ciudadania::orderBy('nombre','ASC')->get();
        $categorias = Categoria::orderBy('nombre','ASC')->get();
        $colecciones = array('urbes'=>$urbes,'sedes'=>$sedes,'cargos'=>$cargos,'ciudadanias'=>$ciudadanias,'categorias'=>$categorias);
        return view('app.socios.filtro', compact('colecciones'));
    }

    /**
     * Busca socios.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtrarSocios(FiltroSocioRequest $request)
    {
        $categorias = Categoria::orderBy('nombre','ASC')->get();
        $categorias->pull('0'); //quitar activo
        $anexos = array('categorias'=>$categorias);
        $coleccion = $this->busquedaFiltroSocios($request)->paginate(10);       
        $total = $coleccion->total();
        return view('home', compact('coleccion', 'total', 'anexos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function mostrarDesvinculado($id)
    {
        $socio = Socio::onlyTrashed()->where('id',$id)->first();
        return view('app.socios.show', compact('socio'));
    }

}
