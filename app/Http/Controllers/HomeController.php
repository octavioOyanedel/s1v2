<?php

namespace App\Http\Controllers;

use App\User;
use App\Socio;
use App\Categoria;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use App\Http\Requests\FiltroSocioRequest;

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
    public function index()
    {

        $categorias = Categoria::orderBy('nombre','ASC')->get();
        $categorias->pull('0'); //quitar activo
        $anexos = array('categorias'=>$categorias);
        $coleccion = Socio::orderBy('created_at','DESC')->paginate(10);                     
        $total = $coleccion->total();
        return view('home', compact('coleccion', 'total', 'anexos'));
    }
}
