<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = 'tipoevento';
    protected $primaryKey = 'idTipoEvento';
    public $timestamps = false;
    use HasFactory;

    public function tipotrans()
    {
        return $this->hasMany(TipoTrans::class, 'idTipoEvento', 'idTipoEvento');
    }
}

