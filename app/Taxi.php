<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];
}
