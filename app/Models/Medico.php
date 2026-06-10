<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'celular',
        'contraseña',
        'RUT',
        'hospital_id'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
