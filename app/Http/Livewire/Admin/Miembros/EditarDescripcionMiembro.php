<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\MiembroDescripcionTrans;
use Livewire\Component;

class EditarDescripcionMiembro extends Component
{
    public $idMiemDes;
    public $descripcionTrans;
    public $idioma;

    protected $rules = [
        'descripcionTrans' => 'required|string',
    ];
    public function mount(MiembroDescripcionTrans $miembroDescripcionTrans, $idioma)
    {
        $this->idMiemDes = $miembroDescripcionTrans->idMiemDes;
        $this->descripcionTrans =  $miembroDescripcionTrans->descripcionTrans;
        $this->idioma = $idioma;
    }

    public function editarDescripcionMiembro()
    {
        $datos =  $this->validate();
        try {
            $miembroDescripcionTransFind = MiembroDescripcionTrans::find($this->idMiemDes);
            $miembroDescripcionTransFind->descripcionTrans = $datos['descripcionTrans'];
            $miembroDescripcionTransFind->save();
            $this->emitUp('updateParent', $miembroDescripcionTransFind->idMiemDes, true);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.miembros.editar-descripcion-miembro');
    }
}