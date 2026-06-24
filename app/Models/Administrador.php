<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Authenticatable
{
    use HasFactory;

    use HasApiTokens;

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