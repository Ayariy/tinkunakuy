<?php

namespace App\Http\Livewire\Admin\Agenda\Eventos;

use App\Models\Miembro;
use Livewire\Component;

class CrearEvento extends Component
{
    public $servicio;
    public function render()
    {
        $miembros = Miembro::where('estado', '=', true)->get();
        return view('livewire.admin.agenda.eventos.crear-evento', ['miembros' => $miembros]);
    }
}