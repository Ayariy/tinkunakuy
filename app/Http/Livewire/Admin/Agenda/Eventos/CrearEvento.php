<?php

namespace App\Http\Livewire\Admin\Agenda\Eventos;

use App\Models\Horario;
use App\Models\Miembro;
use App\Models\Modulo;
use App\Models\Servicio;
use App\Models\TipoEvento;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearEvento extends Component
{
    public $nombreKi;
    public $nombreEs;
    public $nombreEn;
    public $descripcionKi;
    public $descripcionEs;
    public $descripcionEn;
    public $horas;
    public $precio;
    public $lugar;
    public $fechaInit;
    public $fechaFin;
    public $photo;
    public $serviciosSelect;
    public $tiposSelect;
    public $modulosSelect;
    public $miembrosSelect;
    public $horariosSelect;
    use WithFileUploads;

    protected $rules = [
        'nombreKi' => 'required|string|max:50',
        'nombreEs' => 'required|string|max:50',
        'nombreEn' => 'required|string|max:50',
        'descripcionKi' => 'required|string',
        'descripcionEs' => 'required|string',
        'descripcionEn' => 'required|string',
        'horas' => 'required|numeric|digits:4',
        'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:9',
        'lugar' => 'required|string|max:150',
        'fechaInit' => 'required|date|after_or_equal:today',
        'fechaFin' => 'required|date|after_or_equal:fechaInit',
        'photo' => 'required|image|max:10000',
        'serviciosSelect' => 'required',
        'tiposSelect'=> 'required',
        'modulosSelect'=> 'required',
        'miembrosSelect' => 'required',
        'horariosSelect' => 'required',
    ];

    public function updatedPhoto()
    {

       $datos =  $this->validateOnly('photo');
    }

    public function changeModulo($moduloValue){
        $modulo =  str_replace(['@', '@', '@'], [" - ", " - ", " - "], $moduloValue);
        return $modulo;
    }

    public function replaceArrayDay($dayFormat)
    {
        $lun = $this->getNameDay(1);
        $mar = $this->getNameDay(2);
        $mie = $this->getNameDay(3);
        $jue = $this->getNameDay(4);
        $vie = $this->getNameDay(5);
        $sab = $this->getNameDay(6);
        $dom = $this->getNameDay(0);
        $day =  str_replace(['@1@', '@2@', '@3@', '@4@', '@5@', '@6@', '@0@'], [$lun, $mar, $mie, $jue, $vie, $sab, $dom], $dayFormat);
        return $day;
    }
    public function getNameDay($numDay)
    {
        return Carbon::create(Carbon::getDays()[$numDay])->locale(app()->getLocale())->dayName;
    }
    public function crearEvento()
    {       
        // dd($this->serviciosSelect,$this->fechaFin, $this->photo, $this->nombreEn);
        $datos = $this->validate();
        dd($datos);
    }
    public function render()
    {
        $miembros = Miembro::where('estado', '=', true)->get();
        $servicios = Servicio::all();
        $tipos = TipoEvento::all();
        $modulos =  Modulo::all();
        $horarios =  Horario::all();
        return view('livewire.admin.agenda.eventos.crear-evento', 
        [
            'miembros' => $miembros, 
        'servicios' => $servicios, 
        'tipos' => $tipos,
        'modulos' => $modulos,
        'horarios' => $horarios
    ]);
    }
}