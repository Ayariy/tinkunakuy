<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\Miembro;
use DB;
// use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Cursor;
use Livewire\Component;

class MostrarMiembros extends Component
{
    public $search;

    public $miembros;
    public $nextCursor; // holds our current page position.
    public $hasMorePages;

    protected $listeners = ['updateParent', 'deleteMiembro',];

    public function mount()
    {

        $this->miembros = new Collection();
        $this->loadMore();
    }

    public function updatedSearch()
    {
        // dd('asd');
        $this->miembros = new Collection();
        $this->nextCursor = null;
        $this->hasMorePages = null;
        $this->loadMore();
        // $miembros = Miembro::when($this->search, function ($query) {
        //     $query->where('nombre', 'like', '%' . $this->search . '%');
        // })->cursorPaginate(2, ['*'], 'cursor', Cursor::fromEncoded($this->nextCursor));
    }

    public function loadMore()
    {

        // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $out->writeln("Hello from Terminal");
        if ($this->hasMorePages !== null  && !$this->hasMorePages) {
            return;
        }

        $miembros = Miembro::when($this->search, function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        })->cursorPaginate(3, ['*'], 'cursor', Cursor::fromEncoded($this->nextCursor));

        $this->miembros->push(...$miembros->items());
        $this->hasMorePages = $miembros->hasMorePages();
        if ($this->hasMorePages === true) {
            $this->nextCursor = $miembros->nextCursor()->encode();
        }
    }

    public function updateParent($idMiembro, $isDescription)
    {
        $this->dispatchBrowserEvent('showToast', ['idMiembro' => $idMiembro, 'isDescription' => $isDescription]);
    }

    public function deleteMiembro(Miembro $miembro)
    {
        $miembro->delete();
        $this->miembros = new Collection();
        $this->nextCursor = null;
        $this->hasMorePages = null;
        $this->loadMore();
    }

    public function render()
    {
        // $miembros = Miembro::when($this->search, function ($query) {
        //     $query->where('nombre', 'like', '%' . $this->search . '%');
        // })->paginate(3);
        // dd(str_replace('%20', '', Cloudinary::getImageTag('miembros/mfy1mbrerhcknjue7c1x')->format(" auto")->createU));

        return view(
            'livewire.admin.miembros.mostrar-miembros',
            ['totalMiembros' => Miembro::count()]
        );
    }
}



        // DB::enableQueryLog();
        // dd(Miembro::count(), DB::getQueryLog());