<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'institucion';
    protected $primaryKey = 'idInstitucion';
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'tituloTrans',
        'textoTrans',
        'codigoIdioma',
    ];
}