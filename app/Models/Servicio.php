<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'idServicio';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'icono',
    ];

    public function serviciodescripciontrans()
    {
        return $this->hasMany(ServicioDescripcionTrans::class, 'idServicio', 'idServicio');
    }

    public function servicionombretrans()
    {
        return $this->hasMany(ServicioNombreTrans::class, 'idServicio', 'idServicio');
    }
}