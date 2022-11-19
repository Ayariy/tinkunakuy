<?php

namespace App\Http\Livewire\Admin\Agenda\Modulos;

use App\Models\Modulo;
use Livewire\Component;

class EditarModulo extends Component
{
    public $idModulo;
    public $modulo;
    public $moduloKi;
    public $moduloEs;
    public $moduloEn;

    protected $rules = [
        'moduloKi' => 'required|string|max:66',
        'moduloEs' => 'required|string|max:66',
        'moduloEn' => 'required|string|max:66',
    ];
    public function mount(Modulo $modulo){
        $this->idModulo= $modulo->idModulo;
        $arrayModulo = explode("@",$modulo->modulo); 
        $this->moduloKi= $arrayModulo[0];
        $this->moduloEs= $arrayModulo[1];
        $this->moduloEn= $arrayModulo[2];
    }

    public function editarModulo()
    {
        $datos =  $this->validate();
        $this->modulo = $datos['moduloKi']."@".$datos['moduloEs']."@".$datos['moduloEn'];
        try {
            $moduloFind = Modulo::find($this->idModulo);
            $moduloFind->modulo = $this->modulo;;
            $moduloFind->save();
            $this->emitUp('updateParent', $moduloFind->idModulo);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.agenda.modulos.editar-modulo');
    }
}
