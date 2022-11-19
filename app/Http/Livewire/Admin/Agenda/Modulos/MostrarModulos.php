<?php

namespace App\Http\Livewire\Admin\Agenda\Modulos;

use App\Models\Modulo;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarModulos extends Component
{
    use WithPagination;
    public $perPage;
    public $search;
    protected $listeners =  ["updateParent", "deleteModulo"];
    public function mount()
    {
        // dd(session()->get('perPage'));
        $this->search = session()->has('search') ? session()->get('search') : '';
        $this->perPage = session()->has('perPage') ? session()->get('perPage') : 10;
    }

    public function updateParent($idModulo)
    {
        $this->dispatchBrowserEvent('showToast', ['idModulo' => $idModulo]);
    }

    public function updatedSearch()
    {
        session()->put('search', $this->search);
        $this->resetPage();

    }
    public function updatedPerPage()
    {

        // dd($this->perPage);
        session()->put('perPage', $this->perPage);
        $this->resetPage();
    }

    public function changeModulo($moduloValue){
        $modulo =  str_replace(['@', '@', '@'], [" - ", " - ", " - "], $moduloValue);
        return $modulo;
    }

    public function deleteModulo(Modulo $modulo)
    {
        $modulo->delete();
    }



    public function render()
    {
        $modulos =  Modulo::when($this->search, function ($query) {
            $query->where('modulo', 'like', '%' . $this->search. '%');
        })->paginate($this->perPage);
        $modulos->withPath('/admin/agenda/modulos');
        return view('livewire.admin.agenda.modulos.mostrar-modulos',['modulos'=> $modulos]);
    }
}
