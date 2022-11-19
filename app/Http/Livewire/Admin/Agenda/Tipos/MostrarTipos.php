<?php

namespace App\Http\Livewire\Admin\Agenda\Tipos;

use App\Models\TipoEvento;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarTipos extends Component
{
    use WithPagination;
    public $perPage;
    public $search;
    protected $listeners =  ["updateParent", "deleteTipo"];
    public function mount()
    {
        // dd(session()->get('perPage'));
        $this->search = session()->has('search') ? session()->get('search') : '';
        $this->perPage = session()->has('perPage') ? session()->get('perPage') : 10;
    }

    public function updateParent($idTipo)
    {
        $this->dispatchBrowserEvent('showToast', ['idTipo' => $idTipo]);
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


    public function deleteTipo(TipoEvento $tipo)
    {
        $tipo->delete();
    }


    public function render()
    {
        $tipos = TipoEvento::whereHas('tipotrans', function (Builder $query) {
            $query->where('tipo', 'like', '%' . $this->search . '%');
        })->paginate($this->perPage);

        $tipos->withPath('/admin/cargo');
        return view('livewire.admin.agenda.tipos.mostrar-tipos',['tipos'=>$tipos]);
    }
}
