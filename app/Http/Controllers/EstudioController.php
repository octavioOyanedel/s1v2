<?php

namespace App\Http\Controllers;

use App\Fase;
use App\Grado;
use App\Socio;
use App\Estudio;
use App\Traits\LogGenerico;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use App\Http\Requests\EstudioRequest;

class EstudioController extends Controller
{
    use CrudGenerico;
    use LogGenerico;
    use BuscarGenerico;     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $socio = Socio::findOrfail($request->id);
        $coleccion = Estudio::where('socio_id',$request->id)->orderBy('created_at','DESC')->paginate(15); 
        $total = $coleccion->total();
        return view('app.estudios.index', compact('coleccion', 'total', 'socio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $socio = null;
        if($request->id){
            $socio = Socio::findOrFail($request->id);
        }else{
            $socio = false;
        }        
        $socios = Socio::orderBy('apellido1','ASC')->get();
        $grados = Grado::orderBy('nombre','ASC')->get();
        $fases = Fase::orderBy('nombre','ASC')->get();
        $colecciones = array('socios'=>$socios,'grados'=>$grados,'fases'=>$fases);
        return view('app.estudios.create', compact('colecciones','socio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudioRequest $request)
    {
        $this->createGenerico($request, new Estudio);
        return redirect('estudios/create')->with('status', 'Estudio Registrado!'); 
              
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function show(Estudio $estudio)
    {
        $objeto = $estudio;
        return view('app.estudios.show', compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudio $estudio)
    {
        $grados = Grado::orderBy('nombre','ASC')->get();
        $fases = Fase::orderBy('nombre','ASC')->get();
        $objetos = array('estudio' => $estudio);
        $colecciones = array('grados'=>$grados,'fases'=>$fases);
        return view('app.estudios.edit', compact('colecciones','objetos'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function update(EstudioRequest $request, Estudio $estudio)
    {
        $this->updateGenerico($request, $estudio);
        return redirect('home')->with('status', 'Estudio Realizado Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudio $estudio)
    {
        // dd($estudio);
        $id = $estudio->socio_id;
        $this->deleteGenerico($estudio);
        return back()->with('status', 'Estudio realizado Eliminado!');  
    }
}
