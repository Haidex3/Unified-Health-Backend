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
        'paciente_id',
        'horario_hora_id'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
