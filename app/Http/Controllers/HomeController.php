<?php

namespace App\Http\Controllers;

use App\User;
use App\Categoria;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;

class HomeController extends Controller
{
    use CrudGenerico;
    use BuscarGenerico;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $cantidad = obtenerCantidad($request);
        $columna = obtenerColumna($request);
        $orden = obtenerOrden($request);
        $categorias = Categoria::orderBy('nombre','ASC')->get();
        $categorias->pull('0');
        $anexos = array('categorias'=>$categorias);
        $coleccion = null;
        
        switch ($columna) {
            case 'comuna_id':
                $coleccion = $this->buscarParaFiltradoJoin('comunas', 'socios', 'nombre', $cantidad, $columna, $orden);
                break;
             case 'sede_id':
                $coleccion = $this->buscarParaFiltradoJoin('sedes', 'socios', 'nombre', $cantidad, $columna, $orden);
                break;  
             case 'cargo_id':
                $coleccion = $this->buscarParaFiltradoJoin('cargos', 'socios', 'nombre', $cantidad, $columna, $orden);
                break;
             case 'ciudadania_id':
                $coleccion = $this->buscarParaFiltradoJoin('ciudadanias', 'socios', 'nombre', $cantidad, $columna, $orden);
                break;
             case 'categoria_id':
                $coleccion = $this->buscarParaFiltradoJoin('categorias', 'socios', 'nombre', $cantidad, $columna, $orden);
                break;                                                      
            default:
                $coleccion = $this->buscarParaFiltrado('socios', $cantidad, $columna, $orden);
                break;
        } 
                   
        $total = $coleccion->total();

        return view('home', compact('coleccion', 'total', 'anexos'));
    }
}
