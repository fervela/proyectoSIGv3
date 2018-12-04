<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taxi extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];

    public function ubicaciones(){
    	return $this->hasMany('App\Ubicacion','taxi');
    }
}