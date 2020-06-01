<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tabla extends Component
{
    public $coleccion;
    public $contenido;
    public $titulo;
    public $alinear;
    public $total;
    public $anexos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coleccion, $contenido, $titulo, $alinear, $total, $anexos)
    {
        $this->coleccion = $coleccion;
        $this->contenido = $contenido;
        $this->titulo = $titulo;
        $this->alinear = $alinear;
        $this->total = $total;
        $this->anexos = $anexos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.tabla');
    }
}
