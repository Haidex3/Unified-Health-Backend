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
        'hospital_id'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}