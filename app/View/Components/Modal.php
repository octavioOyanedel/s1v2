<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $titulo;
    public $csrf;
    public $action;
    public $texto;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $titulo, $csrf, $action, $texto)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->csrf = $csrf;
        $this->action = $action;
        $this->texto = $texto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal.modal');
    }
}
