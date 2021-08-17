<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $guarded = [

    ];

    protected $casts = [
      'num_cuenta' => 'string',
    ];
}
