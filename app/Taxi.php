<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxi extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
    // protected $table = 'taxis';
    protected $fillable = [
        'placa', 'marca', 'modelo', 'anio', 'color', 'tipo', 'nasiento', 'npuerta', 'parilla', 'aire', 'foto', 'propietario', 'estado', 'condicion'
    ];
    public function ubicaciones(){
    	return $this->hasMany('App\Ubicacion','taxi');
    }

    public function propietario(){
    	return $this->belongsTo('App\User','propietario');
    }
}