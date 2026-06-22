<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrador extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'RUT',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}