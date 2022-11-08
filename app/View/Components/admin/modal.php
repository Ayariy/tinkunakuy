<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public $idModal;
    // public $tituloModal;
    public function __construct()
    {
        // $this->idModal =  $idModal;
        // $this->tituloModal = $tituloModal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal');
    }
}