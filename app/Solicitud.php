<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Solicitud extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
}
