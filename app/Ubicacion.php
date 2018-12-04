<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ubicacion extends Model
{
    protected $fillable = [
        'longitud', 'latitud', 'velocidad', 'taxi'
    ];

    public function taxi(){
    	return $this->belongsTo('App\Taxi','taxi','id');
    }
}
