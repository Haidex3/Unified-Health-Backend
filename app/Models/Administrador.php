<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'contraseña',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
