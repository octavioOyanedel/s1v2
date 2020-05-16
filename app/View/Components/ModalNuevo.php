<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalNuevo extends Component
{
    public $label;
    public $titulo;
    public $csrf;
    public $action;
    public $colecciones;
    public $keyColeccion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $titulo, $csrf, $action, $colecciones, $keyColeccion)
    {
        $this->label = $label;
        $this->titulo = $titulo;
        $this->csrf = $csrf;
        $this->action = $action;
        $this->colecciones = $colecciones;
        $this->keyColeccion = $keyColeccion;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal.modal-nuevo');
    }
}
