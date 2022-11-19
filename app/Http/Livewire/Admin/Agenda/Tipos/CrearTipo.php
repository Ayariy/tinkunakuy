<?php

namespace App\Http\Livewire\Admin\Agenda\Tipos;

use App\Models\TipoEvento;
use App\Models\TipoTrans;
use DB;
use Livewire\Component;

class CrearTipo extends Component
{
    public $tipo;
    public $tipoKi;
    public $tipoEs;
    public $tipoEn;

    protected $rules = [
        'tipoKi' => 'required|string|max:50',
        'tipoEs' => 'required|string|max:50',
        'tipoEn' => 'required|string|max:50',
    ];


    public function crearTipo()
    {
        $datos =  $this->validate();
        try {
            DB::transaction(function () use ($datos) {
                $tipo =  TipoEvento::create();
                $tipoKi = TipoTrans::create([
                    'tipo' => $datos['tipoKi'],
                    'codigoIdioma' => 'ki',
                    'idTipoEvento' => $tipo->idTipoEvento
                ]);
                $tipoEs = TipoTrans::create([
                    'tipo' => $datos['tipoEs'],
                    'codigoIdioma' => 'es',
                    'idTipoEvento' => $tipo->idTipoEvento
                ]);
                $tipoEn = TipoTrans::create([
                    'tipo' => $datos['tipoEn'],
                    'codigoIdioma' => 'en',
                    'idTipoEvento' => $tipo->idTipoEvento
                ]);
            });
            session()->flash('mensaje', __('messages.save_correctly'));
            return redirect()->to('admin/agenda/tipos');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.agenda.tipos.crear-tipo');
    }
}
