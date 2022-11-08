<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembro';
    protected $primaryKey = 'idMiembro';
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'facebook',
        'instagram',
        'foto',
        'fechaRegistro',
        'estado',
    ];


    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'miembrocargo', 'idMiembro', 'idcargo')->using(MiembroCargo::class);
    }

    public function descripciontrans()
    {
        return $this->hasMany(MiembroDescripcionTrans::class, 'idMiembro', 'idMiembro');
    }
}