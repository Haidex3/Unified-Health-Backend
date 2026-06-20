<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'ubicacion',
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}