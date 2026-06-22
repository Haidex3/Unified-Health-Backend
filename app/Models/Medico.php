<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Medico extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'RUT',
        'password',
        'celular',
        'hospital_id',
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function horarios()
    {
        return $this->hasMany(HorarioHora::class);
    }
}