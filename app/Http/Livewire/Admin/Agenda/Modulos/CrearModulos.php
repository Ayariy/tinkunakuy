<?php

namespace App\Http\Livewire\Admin\Agenda\Modulos;

use App\Models\Modulo;
use Livewire\Component;

class CrearModulos extends Component
{
    public $modulo;
    public $moduloKi;
    public $moduloEs;
    public $moduloEn;

    protected $rules = [
        'moduloKi' => 'required|string|max:66',
        'moduloEs' => 'required|string|max:66',
        'moduloEn' => 'required|string|max:66',
    ];

    public function crearModulo()
    {
        $datos =  $this->validate();
        $this->modulo = $datos['moduloKi']."@".$datos['moduloEs']."@".$datos['moduloEn'];

        try {
            Modulo::create([
                'modulo' => $this->modulo,
            ]);
            session()->flash('mensaje', __('messages.save_correctly'));
            return redirect()->to('admin/agenda/modulos');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.agenda.modulos.crear-modulos');
    }
}
