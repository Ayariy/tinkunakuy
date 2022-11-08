<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioNombreTrans extends Model
{
    protected $table = 'servicionombretrans';
    protected $primaryKey = 'idservicioNombreTrans';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'nombreTrans',
        'codigoTrans',
        'idServicio',
    ];
}