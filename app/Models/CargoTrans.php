<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoTrans extends Model
{
    protected $table = 'cargotrans';
    protected $primaryKey = 'idCargoTrans';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'cargoTrans',
        'codigoIdioma',
        'idCargo'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'idCargo', 'idCargo');
    }
}