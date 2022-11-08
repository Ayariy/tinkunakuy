<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiembroDescripcionTrans extends Model
{
    protected $table = 'miembrodescripciontrans';
    protected $primaryKey = 'idMiemDes';
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'descripcionTrans',
        'codigoIdioma',
        'idMiembro',
    ];
}