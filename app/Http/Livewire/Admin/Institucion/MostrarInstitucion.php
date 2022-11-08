<?php

namespace App\Http\Livewire\Admin\Institucion;

use App\Models\Institucion;
use Livewire\Component;

class MostrarInstitucion extends Component
{

    protected $listeners =  ["updateParent"];

    public function updateParent($idInstitucion)
    {
        $this->dispatchBrowserEvent('showToast', ['idInstitucion' => $idInstitucion]);
    }

    public function render()
    {
        $institucions = Institucion::all();
        return view('livewire.admin.institucion.mostrar-institucion', ['institucions' => $institucions]);
    }
}