<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioDescripcionTrans extends Model
{
    protected $table = 'serviciodescripciontrans';
    protected $primaryKey = 'idServDes';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'descripcionTrans',
        'codigoIdioma',
        'idServicio',
    ];
}