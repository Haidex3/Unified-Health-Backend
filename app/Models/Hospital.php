<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'direccion',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
