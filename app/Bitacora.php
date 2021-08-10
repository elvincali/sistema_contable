<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bitacora extends Model
{
    protected $guarded = [
        
    ];

    public static function register($accion, $descripcion, $ip){
        Bitacora::create([
            'id_user' => Auth::id(),
            'name_user' => Auth::user()->nombre . Auth::user()->apellido_pat,
            'action' => $accion,
            'description' => $descripcion,
            'ip' => $ip
        ]);
    }
}
