<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $id;
    public $colecciones;
    public $objetos;
    public $alinear;
    public $metodo;
    public $action;
    public $csrf;    
    public $titulo;
    public $colorBoton;
    public $tituloBoton;
    public $tamanoBoton;
    public $largoBoton;
    public $idBoton;
    public $extra;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $colecciones, $objetos, $alinear, $metodo, $action, $csrf, $titulo, $colorBoton, $tituloBoton, $tamanoBoton, $largoBoton, $idBoton, $extra)
    {
        $this->id = $id;
        $this->colecciones = $colecciones;
        $this->objetos = $objetos;
        $this->alinear = $alinear;
        $this->metodo = $metodo;
        $this->action = $action;
        $this->csrf = $csrf;
        $this->titulo = $titulo;
        $this->colorBoton = $colorBoton;
        $this->tituloBoton = $tituloBoton;
        $this->tamanoBoton = $tamanoBoton;
        $this->largoBoton = $largoBoton;
        $this->idBoton = $idBoton;
        $this->extra = $extra;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.form');
    }
}
