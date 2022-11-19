<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulo';
    protected $primaryKey = 'idModulo';
    public $timestamps = false;

    protected $fillable = [
        'modulo',
    ];
    use HasFactory;
}
