<?php

namespace App\Http\Livewire\Admin\Agenda\Horarios;

use App\Models\Horario;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarHorarios extends Component
{

    use WithPagination;

    public $perPage;
    public $search;
    protected $listeners =  ["updateParent", "deleteHorario"];

    public function mount()
    {
        // dd(session()->get('perPage'));
        $this->search = session()->has('search') ? session()->get('search') : '';
        $this->perPage = session()->has('perPage') ? session()->get('perPage') : 10;
    }


    public function updateParent($idHorario)
    {
        $this->dispatchBrowserEvent('showToast', ['idHorario' => $idHorario]);
    }

    public function updatedSearch()
    {
        session()->put('search', $this->search);
    }
    public function updatedPerPage()
    {

        // dd($this->perPage);
        session()->put('perPage', $this->perPage);
        $this->resetPage();
    }

    public function deleteHorario(Horario $horario)
    {
        $horario->delete();
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

    public function replaceSearchDay($daySearch)
    {
        $lun = $this->getNameDay(1);
        $mar = $this->getNameDay(2);
        $mie = $this->getNameDay(3);
        $jue = $this->getNameDay(4);
        $vie = $this->getNameDay(5);
        $sab = $this->getNameDay(6);
        $dom = $this->getNameDay(0);
        $day =  str_replace( [$lun, $mar, $mie, $jue, $vie, $sab, $dom],['@1@', '@2@', '@3@', '@4@', '@5@', '@6@', '@0@'], $daySearch);
        return $day;
    }
    public function getNameDay($numDay)
    {
        return Carbon::create(Carbon::getDays()[$numDay])->locale(app()->getLocale())->dayName;
    }
    public function render()
    {
        // $cargos = Cargo::whereHas('cargotrans', function (Builder $query) {
        //     $query->where('cargoTrans', 'like', '%' . $this->search . '%');
        // })->paginate($this->perPage);
        // $cargos = Cargo::paginate($this->perPage);

        $horarios =  Horario::when($this->search, function ($query) {
            $query->where('horario', 'like', '%' . $this->replaceSearchDay($this->search) . '%');
        })->paginate($this->perPage);
        $horarios->withPath('/admin/agenda/horarios');
        return view('livewire.admin.agenda.horarios.mostrar-horarios', ['horarios' => $horarios]);
    }
}