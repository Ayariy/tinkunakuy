<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\Cargo;
use App\Models\CargoTrans;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CrearCargo extends Component
{

    public $cargoTransKi;
    public $cargoTransEs;
    public $cargoTransEn;

    protected $rules = [
        'cargoTransKi' => 'required|string|max:45',
        'cargoTransEs' => 'required|string|max:45',
        'cargoTransEn' => 'required|string|max:45'
    ];


    public function crearCargo()
    {

        $datos = $this->validate();

        try {
            DB::transaction(function () use ($datos) {
                $cargo =  Cargo::create();
                $cargoEs = CargoTrans::create([
                    'cargoTrans' => $datos['cargoTransKi'],
                    'codigoIdioma' => 'ki',
                    'idCargo' => $cargo->idcargo
                ]);
                $cargoEs = CargoTrans::create([
                    'cargoTrans' => $datos['cargoTransEs'],
                    'codigoIdioma' => 'es',
                    'idCargo' => $cargo->idcargo
                ]);
                $cargoEs = CargoTrans::create([
                    'cargoTrans' => $datos['cargoTransEn'],
                    'codigoIdioma' => 'en',
                    'idCargo' => $cargo->idcargo
                ]);
            });
            session()->flash('mensaje', __('messages.save_correctly'));
            return redirect()->to('admin/cargo');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.miembros.crear-cargo',);
    }
}