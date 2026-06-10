<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioHora extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora',
        'disponible',
        'fecha',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
