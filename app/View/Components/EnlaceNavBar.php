<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EnlaceNavBar extends Component
{
    public $titulo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.nav.enlace-nav-bar');
    }
}
