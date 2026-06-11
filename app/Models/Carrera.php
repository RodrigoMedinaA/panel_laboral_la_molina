<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'id',
        'nombre',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
