<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablaMostrar extends Component
{
    public $objeto;
    public $alinear;
    public $titulo;
    public $tabla;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($objeto, $alinear, $titulo, $tabla)
    {
        $this->objeto = $objeto;
        $this->alinear = $alinear;
        $this->titulo = $titulo;
        $this->tabla = $tabla;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.tabla-mostrar');
    }
}
