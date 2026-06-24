<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;


class Paciente extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

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