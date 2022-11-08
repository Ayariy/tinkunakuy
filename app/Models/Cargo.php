<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $primaryKey = 'idcargo';
    public $timestamps = false;

    use HasFactory;

    public function cargotrans()
    {
        return $this->hasMany(CargoTrans::class, 'idCargo', 'idcargo');
    }

    public function miembros()
    {
        return $this->belongsToMany(Miembro::class)->using(MiembroCargo::class);
    }
}