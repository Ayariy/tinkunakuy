<?php

namespace App\Http\Livewire\Admin\Miembros;

use App\Models\Cargo;
use App\Models\Miembro;

use App\Models\MiembroDescripcionTrans;
use Livewire\Component;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use DB;
use Illuminate\Support\Carbon;


class CrearMiembro extends Component
{

    public $name;
    public $email;
    public $phone;
    public $miembroKi;
    public $miembroEs;
    public $miembroEn;
    public $facebook;
    public $instagram;
    public $photo;
    public $cargosSelect;
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:45',
        'email' => 'required|email|max:45',
        'phone' => 'required|numeric|digits:10',
        'miembroKi' => 'required|string',
        'miembroEs' => 'required|string',
        'miembroEn' => 'required|string',
        'facebook' => 'required|url|max:255',
        'instagram' => 'required|url|max:255',
        'photo' => 'required|image|max:10000',
        'cargosSelect' => 'required',
    ];
    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }
    public function crearMiembro()
    {
        $datos =  $this->validate();
        try {
            $obj = Cloudinary::upload($datos['photo']->getRealPath(), [
                'folder' => 'miembros',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ]);

            $publicId = $obj->getPublicId();
            DB::transaction(function () use ($datos, $publicId) {
                if ($publicId) {

                    $miembro =  Miembro::create([
                        'nombre' => $datos['name'],
                        'correo' => $datos['email'],
                        'telefono' => $datos['phone'],
                        'facebook' => $datos['facebook'],
                        'instagram' => $datos['instagram'],
                        'foto' => $publicId,
                        'fechaRegistro' => Carbon::now()->format('Y-m-d H:i:s'),
                        'estado' => true,
                    ]);
                    MiembroDescripcionTrans::create([
                        'descripcionTrans' => $datos['miembroKi'],
                        'codigoIdioma' => 'ki',
                        'idMiembro' => $miembro->idMiembro,
                    ]);
                    MiembroDescripcionTrans::create([
                        'descripcionTrans' => $datos['miembroEs'],
                        'codigoIdioma' => 'es',
                        'idMiembro' => $miembro->idMiembro,
                    ]);
                    MiembroDescripcionTrans::create([
                        'descripcionTrans' => $datos['miembroEn'],
                        'codigoIdioma' => 'en',
                        'idMiembro' => $miembro->idMiembro,
                    ]);
                    $miembro->cargos()->sync($datos['cargosSelect']);
                } else {

                    $this->dispatchBrowserEvent('showToastError');
                }
            });
            session()->flash('mensaje', __('messages.save_correctly'));
            return redirect()->to('admin/miembros');
        } catch (\Exception $e) {
            Cloudinary::destroy($publicId);
            $this->dispatchBrowserEvent('showToastError');
        }
    }

    public function render()
    {

        $cargos = Cargo::get();
        return view('livewire.admin.miembros.crear-miembro', ['cargos' => $cargos]);
    }
}