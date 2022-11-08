<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\Cargo;
use App\Models\CargoTrans;
use Livewire\Component;

class EditarCargo extends Component
{
    public $idCargoTrans;
    public $cargotrans;

    protected $rules = [
        'cargotrans' => 'required|string|max:45',
    ];


    public function mount(CargoTrans $cargotrans)
    {

        $this->idCargoTrans = $cargotrans->idCargoTrans;
        $this->cargotrans =  $cargotrans->cargoTrans;
    }

    public function editarCargo()
    {
        $datos =  $this->validate();

        $cargotransFind = CargoTrans::find($this->idCargoTrans);
        if ($cargotransFind) {
            $cargotransFind->cargoTrans = $datos['cargotrans'];
            $this->dispatchBrowserEvent('loading', ['is' => true]);
            $cargotransFind->save();
            $this->dispatchBrowserEvent('loading', ['is' => false]);
            $this->emitUp('updateParent', $cargotransFind->idCargoTrans);
        } else {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.miembros.editar-cargo');
    }
}