<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MiembroCargo extends Pivot
{
    protected $table = 'miembrocargo';
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [];
}