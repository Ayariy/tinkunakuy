<?php

namespace App\Http\Livewire\Admin\Agenda\Horarios;

use App\Models\Horario;
use Carbon\Carbon;
use Livewire\Component;

class CrearHorario extends Component
{

    public $day;
    public $timeInit;
    public $timeFin;

    public $horario;
    public $horarioArray = [];

    protected $listeners = ['removerDia'];

    public function mount()
    {
        $this->day = 1;
    }

    public function agregarDia()
    {
        $datos =  $this->validate([
            'day' => 'required',
            'timeInit' => 'required',
            'timeFin' => 'required',
        ]);

        $dayString = "@" . $datos['day'] . "@" . " (" . $datos['timeInit'] . " - " . $datos['timeFin'] . ")";

        $this->horarioArray[] =  $dayString;

        $this->horario =  $this->replaceArrayDay(implode(", ", $this->horarioArray));
    }

    public function removerDia($index)
    {
        unset($this->horarioArray[$index]);
        $this->horario =  $this->replaceArrayDay(implode(", ", $this->horarioArray));
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
        // $pattern = '/^@[0-6]@/';
        // $day = '';
        // preg_match($pattern, $dayFormat, $day);
        // $day =  str_replace('@', '', $day)[0];
        // $day = Carbon::create(Carbon::getDays()[$day])->locale(app()->getLocale())->dayName;
        // $dayFormat = preg_replace($pattern, $day, $dayFormat);
        // return $dayFormat;
    }
    public function getNameDay($numDay)
    {
        return Carbon::create(Carbon::getDays()[$numDay])->locale(app()->getLocale())->dayName;
    }
    public function crearHorario()
    {

        // $this->horario =  $this->replaceArrayDay(implode(", ", $this->horarioArray));
        $this->horario =  implode(", ", $this->horarioArray);
        $datos = $this->validate(['horario' => 'required|string|max:200']);
        try {
            Horario::create([
                'horario' => $datos['horario'],
            ]);
            session()->flash('mensaje', __('messages.save_correctly'));
            return redirect()->to('admin/agenda/horarios');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('showToastError');
        }
        // dd($datos);
    }

    public function render()
    {
        // dd(Carbon::create(Carbon::getDays()[0])->locale(app()->getLocale())->dayName, Carbon::getDays());
        return view('livewire.admin.agenda.horarios.crear-horario');
    }
}