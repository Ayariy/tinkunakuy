<?php

namespace App\Http\Livewire\Admin\Servicios;

use App\Models\Servicio;
use App\Models\ServicioDescripcionTrans;
use DB;
use Livewire\Component;

class EditarDescripcionServicio extends Component
{
    public $idServicio;
    public $descripcionKi;
    public $descripcionEs;
    public $descripcionEn;

    //DESCRIPCIONTRANS 
    public $servicioDescripcionKi;
    public $servicioDescripcionEs;
    public $servicioDescripcionEn;

    protected $rules = [
        'descripcionKi' => 'required|string',
        'descripcionEs' => 'required|string',
        'descripcionEn' => 'required|string',
    ];


    public function editarDescripcionServicio()
    {
        $datos =  $this->validate();
        try {
            DB::transaction(function () use ($datos) {
                $servicioDescripcionKi = ServicioDescripcionTrans::find($this->servicioDescripcionKi->idServDes);
                $servicioDescripcionKi->descripcionTrans = $datos['descripcionKi'];
                $servicioDescripcionKi->save();

                $servicioDescripcionEs = ServicioDescripcionTrans::find($this->servicioDescripcionEs->idServDes);
                $servicioDescripcionEs->descripcionTrans = $datos['descripcionEs'];
                $servicioDescripcionEs->save();

                $servicioDescripcionEn = ServicioDescripcionTrans::find($this->servicioDescripcionEn->idServDes);
                $servicioDescripcionEn->descripcionTrans = $datos['descripcionEn'];
                $servicioDescripcionEn->save();

                $this->emitUp('updateParent', $this->idServicio, true);
            });
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
    }

    public function mount(Servicio $servicio)
    {

        $this->idServicio =  $servicio->idServicio;

        $this->servicioDescripcionKi =  $servicio->serviciodescripciontrans->where(
            'codigoIdioma',
            '=',
            'ki'
        )->first();
        $this->descripcionKi = $this->servicioDescripcionKi->descripcionTrans;;

        $this->servicioDescripcionEs =  $servicio->serviciodescripciontrans->where(
            'codigoIdioma',
            '=',
            'es'
        )->first();
        $this->descripcionEs = $this->servicioDescripcionEs->descripcionTrans;;

        $this->servicioDescripcionEn =  $servicio->serviciodescripciontrans->where(
            'codigoIdioma',
            '=',
            'en'
        )->first();
        $this->descripcionEn = $this->servicioDescripcionEn->descripcionTrans;;
    }
    public function render()
    {
        return view('livewire.admin.servicios.editar-descripcion-servicio');
    }
}