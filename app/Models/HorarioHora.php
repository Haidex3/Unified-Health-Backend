<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioHora extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora',
        'fecha',
        'disponible',
        'medico_id',
    ];

    protected $casts = [
        'fecha' => 'date',
        'hora' => 'datetime:H:i:s',
        'disponible' => 'boolean',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function cita()
    {
        return $this->hasOne(Cita::class);
    }
}