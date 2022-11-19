<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTrans extends Model
{
    protected $table = 'tipotrans';
    protected $primaryKey = 'idTipoTrans';
    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'codigoIdioma',
        'idTipoEvento'
    ];
    use HasFactory;

    public function tipoevento()
    {
        return $this->belongsTo(TipoEvento::class, 'idTipoEvento', 'idTipoEvento');
    }
}
