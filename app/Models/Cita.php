<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha',
        'detalles',
        'conclusiones',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
