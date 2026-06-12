<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
    ];

    protected $hidden = [
        'contraseña',
    ];
}