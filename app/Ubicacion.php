<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $fillable = [
        'longitud', 'latitud', 'velocidad', 'taxi'
    ];
}
