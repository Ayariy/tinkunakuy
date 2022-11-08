<?php

namespace App\Http\Livewire\Admin\Agenda;

use App\Models\Servicio;
use Livewire\Component;

class MostrarServicios extends Component
{
    public function render()
    {
        $servicios =  Servicio::all();
        return view('livewire.admin.agenda.mostrar-servicios', ['servicios' => $servicios]);
    }
}