<?php

namespace App\Http\Livewire\Admin\Agenda\Eventos;

use Livewire\Component;

class MostrarEventos extends Component
{
    public $servicio;

    public function render()
    {
        return view('livewire.admin.agenda.eventos.mostrar-eventos');
    }
}