<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\Cargo;
use App\Models\Miembro;
use Cloudinary;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarMiembro extends Component
{

    public $idMiembro;
    public $name;
    public $email;
    public $phone;
    public $facebook;
    public $instagram;
    public $photo;
    public $publicId;
    public $estado;
    public $cargosSelect;
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:45',
        'email' => 'required|email|max:45',
        'phone' => 'required|numeric|digits:10',
        'facebook' => 'required|url|max:255',
        'instagram' => 'required|url|max:255',
        'photo' => 'required|image|max:10000',
        'estado' => 'required',
        'cargosSelect' => 'required',
    ];
    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }
    public function mount(Miembro $miembro)
    {

        $this->idMiembro = $miembro->idMiembro;
        $this->name = $miembro->nombre;
        $this->email = $miembro->correo;
        $this->phone = $miembro->telefono;
        $this->facebook = $miembro->facebook;
        $this->instagram = $miembro->instagram;
        $this->publicId = $miembro->foto;
        $this->estado = $miembro->estado;
        $this->cargosSelect = array_column($miembro->cargos()->get()->toArray(), 'idcargo');
    }
    public function editarMiembro()
    {
        if ($this->photo || $this->publicId == '') {
            $datos =  $this->validate();
            try {
                if ($this->publicId != '') {
                    Cloudinary::destroy($this->publicId);
                }
                $img = Cloudinary::upload($datos['photo']->getRealPath(), [
                    'folder' => 'miembros',
                    'transformation' => [
                        'quality' => 'auto',
                        'fetch_format' => 'auto'
                    ]
                ]);
                $publicId = $img->getPublicId();

                DB::transaction(function () use ($datos, $publicId) {
                    if ($publicId) {
                        $miembroFind = Miembro::find($this->idMiembro);
                        if ($miembroFind) {

                            $miembroFind->nombre = $datos['name'];
                            $miembroFind->correo = $datos['email'];
                            $miembroFind->telefono = $datos['phone'];
                            $miembroFind->facebook = $datos['facebook'];
                            $miembroFind->instagram = $datos['instagram'];
                            $miembroFind->foto = $publicId;
                            $miembroFind->estado = $datos['estado'];
                            $miembroFind->save();

                            $miembroFind->cargos()->sync($datos['cargosSelect']);
                            $this->emitUp('updateParent', $miembroFind->idMiembro, false);
                        } else {
                            $this->dispatchBrowserEvent('showToastError');
                        }
                    } else {

                        $this->dispatchBrowserEvent('showToastError');
                    }
                });
            } catch (\Throwable $th) {
                if ($publicId) {
                    Cloudinary::destroy($publicId);
                }
                $this->dispatchBrowserEvent('showToastError');
            }
        } else {
            $nombre =  $this->validateOnly('name')['name'];
            $correo = $this->validateOnly('email')['email'];
            $celular = $this->validateOnly('phone')['phone'];
            $estado = $this->validateOnly('estado')['estado'];
            $face = $this->validateOnly('facebook')['facebook'];
            $insta = $this->validateOnly('instagram')['instagram'];
            $cargo = $this->validateOnly('cargosSelect')['cargosSelect'];

            try {

                DB::transaction(function () use ($nombre, $correo,  $celular, $face,  $insta, $estado, $cargo) {
                    $miembroFind = Miembro::find($this->idMiembro);
                    if ($miembroFind) {
                        $miembroFind->nombre = $nombre;
                        $miembroFind->correo = $correo;
                        $miembroFind->telefono = $celular;
                        $miembroFind->facebook = $face;
                        $miembroFind->instagram = $insta;
                        $miembroFind->estado = $estado;

                        // $miembroFind->cargo = $cargo;
                        $miembroFind->save();
                        $miembroFind->cargos()->sync($cargo);
                        $this->emitUp('updateParent', $miembroFind->idMiembro, false);
                    } else {
                        $this->dispatchBrowserEvent('showToastError');
                    }
                });
            } catch (\Throwable $th) {
                $this->dispatchBrowserEvent('showToastError');
            }
        }
    }
    public function render()
    {
        $cargos = Cargo::get();
        return view('livewire.admin.miembros.editar-miembro', ['cargos' => $cargos]);
    }
}