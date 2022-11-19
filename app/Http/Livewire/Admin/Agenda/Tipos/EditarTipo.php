<?php

namespace App\Http\Livewire\Admin\Agenda\Tipos;

use App\Models\TipoTrans;
use Livewire\Component;

class EditarTipo extends Component
{
    public $idTipoTrans;
    public $tipo;


    protected $rules = [
        'tipo' => 'required|string|max:50',
    ];

    public function mount(TipoTrans $tipo)
    {
        $this->idTipoTrans= $tipo->idTipoTrans;
        $this->tipo= $tipo->tipo;
    }

    public function editarTipo(){
        $datos =  $this->validate();
        try {
            $tipoFind = TipoTrans::find($this->idTipoTrans);
            $tipoFind->tipo = $datos['tipo'];
            $tipoFind->save();
            $this->emitUp('updateParent', $tipoFind->idTipoTrans);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }

    public function render()
    {
        return view('livewire.admin.agenda.tipos.editar-tipo');
    }
}
