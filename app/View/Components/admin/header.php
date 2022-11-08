<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $rutaHeader;

    public function __construct($title, $rutaHeader)
    {
        // dd(route('admin.institution.index', [], false));
        $this->title =  $title;
        $this->rutaHeader =  $rutaHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.header');
    }
}