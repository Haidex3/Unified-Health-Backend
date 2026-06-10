<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'RUT',
        'celular',
        'sexo',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}