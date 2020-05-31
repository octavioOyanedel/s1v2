<?php

namespace App\Http\Controllers;

use App\Sede;
use App\Urbe;
use App\Cargo;
use App\Socio;
use App\Categoria;
use App\Ciudadania;
use App\Traits\LogGenerico;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use App\Http\Requests\SocioRequest;
use App\Http\Requests\FiltroSocioRequest;

class SocioController extends Controller
{
    use CrudGenerico;
    use LogGenerico;
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
        $categorias->pull('0'); //quitar activo
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
        $coleccion = null;
        switch ($request->tipo_categoria) {
            case 'solo_activos':
                $coleccion = Socio::orderBy('apellido1','ASC')
                    ->rangoFecha($request->fecha_sind1_ini, $request->fecha_sind1_fin, 'fecha_sind1')
                    ->generalAnd($request->categoria_id,'categoria_id')
                    ->rangoFecha($request->fecha_nac_ini, $request->fecha_nac_fin, 'fecha_nac')
                    ->generalAnd($request->genero,'genero')
                    ->generalAnd($request->urbe_id,'urbe_id')
                    ->generalAnd($request->comuna_id,'comuna_id')
                    ->generalAnd($request->direccion,'direccion')
                    ->rangoFecha($request->fecha_pucv_ini, $request->fecha_pucv_fin, 'fecha_pucv')
                    ->generalAnd($request->sede_id,'sede_id')
                    ->generalAnd($request->area_id,'area_id')
                    ->generalAnd($request->cargo_id,'cargo_id')
                    ->generalAnd($request->ciudadania_id,'ciudadania_id')
                    ->paginate(10)->appends([
                        'tipo_categoria' => $request->tipo_categoria,
                        'categoria_id' => $request->categoria_id,
                        'fecha_desv_ini' => $request->fecha_desv_ini,
                        'fecha_desv_fin' => $request->fecha_desv_fin,
                        'fecha_sind1_ini' => $request->fecha_sind1_ini,
                        'fecha_sind1_fin' => $request->fecha_sind1_fin,
                        'fecha_nac_ini' => $request->fecha_nac_ini,
                        'fecha_nac_fin' => $request->fecha_nac_fin,
                        'fecha_pucv_ini' => $request->fecha_pucv_ini,
                        'fecha_pucv_fin' => $request->fecha_pucv_fin,
                        'genero' => $request->genero,
                        'urbe_id' => $request->urbe_id,
                        'comuna_id' => $request->comuna_id,
                        'direccion' => $request->direccion,
                        'ciudadania_id' => $request->ciudadania_id,
                        'sede_id' => $request->sede_id,
                        'area_id' => $request->area_id,
                        'cargo_id' => $request->cargo_id,
                    ]);    
            break;
            case 'todos':
                $coleccion = Socio::withTrashed()->orderBy('apellido1','ASC')
                    ->rangoFecha($request->fecha_desv_ini, $request->fecha_desv_fin, 'deleted_at')
                    ->rangoFecha($request->fecha_sind1_ini, $request->fecha_sind1_fin, 'fecha_sind1')
                    ->generalAnd($request->categoria_id,'categoria_id')
                    ->rangoFecha($request->fecha_nac_ini, $request->fecha_nac_fin, 'fecha_nac')
                    ->generalAnd($request->genero,'genero')
                    ->generalAnd($request->urbe_id,'urbe_id')
                    ->generalAnd($request->comuna_id,'comuna_id')
                    ->generalAnd($request->direccion,'direccion')
                    ->rangoFecha($request->fecha_pucv_ini, $request->fecha_pucv_fin, 'fecha_pucv')
                    ->generalAnd($request->sede_id,'sede_id')
                    ->generalAnd($request->area_id,'area_id')
                    ->generalAnd($request->cargo_id,'cargo_id')
                    ->paginate(10)->appends([
                        'tipo_categoria' => $request->tipo_categoria,
                        'categoria_id' => $request->categoria_id,
                        'fecha_desv_ini' => $request->fecha_desv_ini,
                        'fecha_desv_fin' => $request->fecha_desv_fin,
                        'fecha_sind1_ini' => $request->fecha_sind1_ini,
                        'fecha_sind1_fin' => $request->fecha_sind1_fin,
                        'fecha_nac_ini' => $request->fecha_nac_ini,
                        'fecha_nac_fin' => $request->fecha_nac_fin,
                        'fecha_pucv_ini' => $request->fecha_pucv_ini,
                        'fecha_pucv_fin' => $request->fecha_pucv_fin,
                        'genero' => $request->genero,
                        'urbe_id' => $request->urbe_id,
                        'comuna_id' => $request->comuna_id,
                        'direccion' => $request->direccion,
                        'ciudadania_id' => $request->ciudadania_id,
                        'sede_id' => $request->sede_id,
                        'area_id' => $request->area_id,
                        'cargo_id' => $request->cargo_id,
                    ]);    

            break;
            case 'solo_desvinculados':
                $coleccion = Socio::onlyTrashed()->orderBy('apellido1','ASC')
                    ->rangoFecha($request->fecha_desv_ini, $request->fecha_desv_fin, 'deleted_at')
                    ->rangoFecha($request->fecha_sind1_ini, $request->fecha_sind1_fin, 'fecha_sind1')
                    ->generalAnd($request->categoria_id,'categoria_id')
                    ->rangoFecha($request->fecha_nac_ini, $request->fecha_nac_fin, 'fecha_nac')
                    ->generalAnd($request->genero,'genero')
                    ->generalAnd($request->urbe_id,'urbe_id')
                    ->generalAnd($request->comuna_id,'comuna_id')
                    ->generalAnd($request->direccion,'direccion')
                    ->rangoFecha($request->fecha_pucv_ini, $request->fecha_pucv_fin, 'fecha_pucv')
                    ->generalAnd($request->sede_id,'sede_id')
                    ->generalAnd($request->area_id,'area_id')
                    ->generalAnd($request->cargo_id,'cargo_id')
                    ->paginate(10)->appends([
                        'tipo_categoria' => $request->tipo_categoria,
                        'categoria_id' => $request->categoria_id,
                        'fecha_desv_ini' => $request->fecha_desv_ini,
                        'fecha_desv_fin' => $request->fecha_desv_fin,
                        'fecha_sind1_ini' => $request->fecha_sind1_ini,
                        'fecha_sind1_fin' => $request->fecha_sind1_fin,
                        'fecha_nac_ini' => $request->fecha_nac_ini,
                        'fecha_nac_fin' => $request->fecha_nac_fin,
                        'fecha_pucv_ini' => $request->fecha_pucv_ini,
                        'fecha_pucv_fin' => $request->fecha_pucv_fin,
                        'genero' => $request->genero,
                        'urbe_id' => $request->urbe_id,
                        'comuna_id' => $request->comuna_id,
                        'direccion' => $request->direccion,
                        'ciudadania_id' => $request->ciudadania_id,
                        'sede_id' => $request->sede_id,
                        'area_id' => $request->area_id,
                        'cargo_id' => $request->cargo_id,
                    ]);    
            break;
            
        } 
          
        $total = $coleccion->total();
        return view('app.socios.resultados', compact('coleccion', 'total', 'anexos'));
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

    /**
     * Reincorporar socio.
     *
     * @param  \App\Socio  $socio
     * @return \Illuminate\Http\Response
     */
    public function reincorporar($id)
    {
        $socio = Socio::onlyTrashed()->where('id',$id)->first();
        $socio->categoria_id = 1;
        $socio->deleted_at = null;
        $socio->update(); 
        $this->logGenerico('Socio reincorporado: '.' nombre1 = '.$socio->nombre1.', apellido1 = '.$socio->apellido1.', rut = '.$socio->rut.', id = '.$socio->id);        
        return redirect('home')->with('status', 'Socio Reincorporado!');        
    }    

}
