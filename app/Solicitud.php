<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
}
