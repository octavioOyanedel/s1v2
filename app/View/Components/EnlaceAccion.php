<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EnlaceAccion extends Component
{
    public $titulo;
    public $color;
    public $icono;
    public $ruta;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo, $color, $icono, $ruta, $id)
    {
        $this->titulo = $titulo;
        $this->color = $color;
        $this->icono = $icono;
        $this->ruta = $ruta;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.enlace-accion');
    }
}
