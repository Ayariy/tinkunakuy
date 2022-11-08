<?php

namespace App\Http\Livewire\Admin\Servicios;

use App\Models\Servicio;
use DB;
use Livewire\Component;

class MostrarServicios extends Component
{
    protected $listeners = ['updateParent', 'deleteServicio',];

    public function deleteServicio(Servicio $servicio)
    {
        $servicio->delete();
    }
    public function updateParent($idServicio, $isDescription)
    {
        $this->dispatchBrowserEvent('showToast', ['idServicio' => $idServicio, 'isDescription' => $isDescription]);
    }

    public function render()
    {
        $servicios =  Servicio::all();
        return view('livewire.admin.servicios.mostrar-servicios', ['servicios' => $servicios]);
    }
}
// DB::enableQueryLog();
// dd(Servicio::find(6)->servicionombretrans, DB::getQueryLog());