<?php

namespace App\Http\Livewire\Admin\Servicios;

use App\Models\Servicio;
use App\Models\ServicioNombreTrans;
use DB;
use Livewire\Component;

class EditarNombreServicio extends Component
{
    public $idServicio;
    public $icono;
    public $nombreKi;
    public $nombreEs;
    public $nombreEn;

    //NOMBRETRANS 
    public $servicioNombreKi;
    public $servicioNombreEs;
    public $servicioNombreEn;

    protected $rules = [
        'icono' => 'required|string|max:45',
        'nombreKi' => 'required|string|max:45',
        'nombreEs' => 'required|string|max:45',
        'nombreEn' => 'required|string|max:45',
    ];


    public function editarNombreServicio()
    {
        $datos =  $this->validate();
        try {
            DB::transaction(function () use ($datos) {
                $servicio = Servicio::find($this->idServicio);
                $servicio->icono = $datos['icono'];
                $servicio->save();

                $servicioNombreKi = ServicioNombreTrans::find($this->servicioNombreKi->idservicioNombreTrans);
                $servicioNombreKi->nombreTrans = $datos['nombreKi'];
                $servicioNombreKi->save();

                $servicioNombreEs = ServicioNombreTrans::find($this->servicioNombreEs->idservicioNombreTrans);
                $servicioNombreEs->nombreTrans = $datos['nombreEs'];
                $servicioNombreEs->save();

                $servicioNombreEn = ServicioNombreTrans::find($this->servicioNombreEn->idservicioNombreTrans);
                $servicioNombreEn->nombreTrans = $datos['nombreEn'];
                $servicioNombreEn->save();

                $this->emitUp('updateParent', $this->idServicio, false);
            });
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }

    public function mount(Servicio $servicio)
    {

        $this->idServicio =  $servicio->idServicio;
        $this->icono =  $servicio->icono;

        $this->servicioNombreKi =  $servicio->servicionombretrans->where(
            'codigoTrans',
            '=',
            'ki'
        )->first();
        $this->nombreKi = $this->servicioNombreKi->nombreTrans;;

        $this->servicioNombreEs =  $servicio->servicionombretrans->where(
            'codigoTrans',
            '=',
            'es'
        )->first();
        $this->nombreEs = $this->servicioNombreEs->nombreTrans;;

        $this->servicioNombreEn =  $servicio->servicionombretrans->where(
            'codigoTrans',
            '=',
            'en'
        )->first();
        $this->nombreEn = $this->servicioNombreEn->nombreTrans;;
    }
    public function render()
    {
        return view('livewire.admin.servicios.editar-nombre-servicio');
    }
}