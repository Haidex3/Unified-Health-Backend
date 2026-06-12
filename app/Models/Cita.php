<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'detalles',
        'conclusiones',
        'horario_hora_id',
        'paciente_id',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function horarioHora()
    {
        return $this->belongsTo(HorarioHora::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}