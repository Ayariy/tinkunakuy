<?php

namespace App\Http\Livewire\Admin\Institucion;

use App\Models\Institucion;
use Livewire\Component;

class EditarInstitucion extends Component
{


    public $idModal;
    public $modalColor;

    public $tituloTrans;
    public $textoTrans;

    protected $rules = [
        'tituloTrans' => 'required|string|max:50',
        'textoTrans' => 'required|string'
    ];



    public function editarInstitucion()
    {
        $datos =  $this->validate();
        $institucionFind =  Institucion::find($this->idModal);
        $institucionFind->tituloTrans = $datos['tituloTrans'];
        $institucionFind->textoTrans = $datos['textoTrans'];

        $this->dispatchBrowserEvent('loading', ['is' => true]);
        $institucionFind->save();
        $this->dispatchBrowserEvent('loading', ['is' => false]);
        $this->emitUp('updateParent', $institucionFind->idInstitucion);
    }

    public function mount(Institucion $institucion, $modalColor)
    {
        $this->idModal = $institucion->idInstitucion;
        $this->modalColor = $modalColor;

        $this->tituloTrans = $institucion->tituloTrans;
        $this->textoTrans = $institucion->textoTrans;
    }





    public function render()
    {

        return view('livewire.admin.institucion.editar-institucion');
    }
}