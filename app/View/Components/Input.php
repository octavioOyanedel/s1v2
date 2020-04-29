<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $tipo;
    public $nombre;
    public $id;
    public $margen;
    public $tamano;
    public $valor;
    public $placeholder;
    public $obligatorio;    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $tipo, $nombre, $id, $margen, $tamano, $valor, $placeholder, $obligatorio)
    {
        $this->label = $label;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->id = $id;
        $this->margen = $margen;
        $this->tamano = $tamano;
        $this->valor = $valor;
        $this->placeholder = $placeholder;
        $this->obligatorio = $obligatorio;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
