<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'RUT',
        'contraseña',
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