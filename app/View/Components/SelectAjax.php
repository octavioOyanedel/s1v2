<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectAjax extends Component
{
    public $nombre;
    public $id;
    public $label;
    public $idOld;
    public $idEditar;
    public $obligatorio;
    public $objetos;
    public $keyObjeto;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nombre, $id, $label, $idOld, $idEditar, $obligatorio, $objetos, $keyObjeto)
    {
        $this->nombre = $nombre;
        $this->id = $id;
        $this->label = $label;
        $this->idOld = $idOld;
        $this->obligatorio = $obligatorio;
        $this->idEditar = $idEditar;
        $this->objetos = $objetos;
        $this->keyObjeto = $keyObjeto; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.select-ajax');
    }
}
