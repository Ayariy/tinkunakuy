<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\Cargo;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarCargos extends Component
{
    use WithPagination;

    public $perPage;
    public $search;
    protected $listeners =  ["updateParent", "deleteCargo"];

    public function mount()
    {
        // dd(session()->get('perPage'));
        $this->search = session()->has('search') ? session()->get('search') : '';
        $this->perPage = session()->has('perPage') ? session()->get('perPage') : 10;
    }


    public function updateParent($idCargoTrans)
    {
        $this->dispatchBrowserEvent('showToast', ['idCargoTrans' => $idCargoTrans]);
    }

    public function updatedSearch()
    {
        // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $out->writeln($search);
        // dd($this->search);
        session()->put('search', $this->search);
    }
    public function updatedPerPage()
    {

        // dd($this->perPage);
        session()->put('perPage', $this->perPage);
        $this->resetPage();
    }

    public function deleteCargo(Cargo $cargo)
    {
        $cargo->delete();
    }

    public function render()
    {
        // $cargoTrans = CargoTrans::distinct()->get('idCargo');
        $cargos = Cargo::whereHas('cargotrans', function (Builder $query) {
            $query->where('cargoTrans', 'like', '%' . $this->search . '%');
        })->paginate($this->perPage);

        // $cargos = Cargo::paginate($this->perPage);
        $cargos->withPath('/admin/cargo');
        return view(
            'livewire.admin.miembros.mostrar-cargos',
            ['cargos' => $cargos]
        );
    }
}