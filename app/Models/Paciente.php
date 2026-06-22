<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'RUT',
        'sexo',
        'celular',
        'password',
        'hospital_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}