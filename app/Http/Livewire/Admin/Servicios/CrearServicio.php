<?php

namespace App\Http\Livewire\Admin\Servicios;

use App\Models\Servicio;
use App\Models\ServicioDescripcionTrans;
use App\Models\ServicioNombreTrans;
use DB;
use Livewire\Component;

class CrearServicio extends Component
{
    public $icon = 'fas fa-hashtag';
    public $nombreKi;
    public $nombreEs;
    public $nombreEn;
    public $descripcionKi;
    public $descripcionEs;
    public $descripcionEn;

    protected $rules = [
        'icon' => 'required|string|max:45',
        'nombreKi' => 'required|string|max:45',
        'nombreEs' => 'required|string|max:45',
        'nombreEn' => 'required|string|max:45',
        'descripcionKi' => 'required|string',
        'descripcionEs' => 'required|string',
        'descripcionEn' => 'required|string',
    ];
    public function crearServicio()
    {
        $datos =  $this->validate();

        try {
            DB::transaction(function () use ($datos) {
                $servicio =  Servicio::create(['icono' => $datos['icon']]);
                $nombreKi = ServicioNombreTrans::create([
                    'nombreTrans' => $datos['nombreKi'],
                    'codigoTrans' => 'ki',
                    'idServicio' => $servicio->idServicio
                ]);
                $nombreEs = ServicioNombreTrans::create([
                    'nombreTrans' => $datos['nombreEs'],
                    'codigoTrans' => 'es',
                    'idServicio' => $servicio->idServicio
                ]);
                $nombreEn = ServicioNombreTrans::create([
                    'nombreTrans' => $datos['nombreEn'],
                    'codigoTrans' => 'en',
                    'idServicio' => $servicio->idServicio
                ]);


                $descripcionKi = ServicioDescripcionTrans::create([
                    'descripcionTrans' => $datos['descripcionKi'],
                    'codigoIdioma' => 'ki',
                    'idServicio' => $servicio->idServicio
                ]);
                $descripcionEs =  ServicioDescripcionTrans::create([
                    'descripcionTrans' => $datos['descripcionEs'],
                    'codigoIdioma' => 'es',
                    'idServicio' => $servicio->idServicio
                ]);
                $descripcionEn =  ServicioDescripcionTrans::create([
                    'descripcionTrans' => $datos['descripcionEn'],
                    'codigoIdioma' => 'en',
                    'idServicio' => $servicio->idServicio
                ]);
            });
            session()->flash('mensaje', __('messages.save_correctly'));
            return redirect()->to('admin/servicios');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }
    public function render()
    {
        return view('livewire.admin.servicios.crear-servicio');
    }
}