<?php

namespace App\Http\Livewire\Admin\Agenda\Horarios;

use App\Models\Horario;
use Carbon\Carbon;
use Livewire\Component;

class EditarHorario extends Component
{
    public $idHorario;
    public $horario;
    protected $listeners = ['removerDia'];


    public $day;
    public $timeInit;
    public $timeFin;
    public array $horarioArray;

    public function mount(Horario $horario)
    {
        $this->idHorario = $horario->idHorario;
        $this->day = 1;
        $this->horarioArray = explode(", ", $horario->horario);
        $this->horario = $this->replaceArrayDay($horario->horario);
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


        $this->horarioArray =  array_values($this->horarioArray);
        // dd($horarioAuxArray, $this->horarioArray);
        // $this->horarioArray = array_values($this->horarioArray);
        $this->horario =  $this->replaceArrayDay(implode(", ", $this->horarioArray));
        $this->render();
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
    // public function editarHorario()
    // {

    //     $this->horario =  implode(", ", $this->horarioArray);
    //     $datos = $this->validate(['horario' => 'required|string|max:200']);
    //     try {
    //         Horario::create([
    //             'horario' => $datos['horario'],
    //         ]);
    //         session()->flash('mensaje', __('messages.save_correctly'));
    //         return redirect()->to('admin/agenda/horarios');
    //     } catch (\Throwable $th) {
    //         $this->dispatchBrowserEvent('showToastError');
    //     }
    //     // dd($datos);
    // }
    public function render()
    {
        return view('livewire.admin.agenda.horarios.editar-horario');
    }
}