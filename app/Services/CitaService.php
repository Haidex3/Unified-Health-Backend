<?php

namespace App\Services;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CitaService
{
    public function getAll(): Collection
    {
        return Cita::with([
            'horarioHora',
            'paciente',
        ])->get();
    }

    public function getById(int $id): Cita
    {
        return Cita::with([
            'horarioHora',
            'paciente',
        ])->findOrFail($id);
    }

    public function create(array $data): Cita
    {
        return Cita::create([
            'fecha' => $data['fecha'],
            'detalles' => $data['detalles'],
            'conclusiones' => $data['conclusiones'],
            'horario_hora_id' => $data['horario_hora_id'],
            'paciente_id' => $data['paciente_id'],
        ]);
    }

    public function update(int $id, array $data): Cita
    {
        $cita = Cita::findOrFail($id);

        $cita->update([
            'fecha' => $data['fecha'] ?? $cita->fecha,
            'detalles' => $data['detalles'] ?? $cita->detalles,
            'conclusiones' => $data['conclusiones'] ?? $cita->conclusiones,
            'horario_hora_id' => $data['horario_hora_id'] ?? $cita->horario_hora_id,
            'paciente_id' => $data['paciente_id'] ?? $cita->paciente_id,
        ]);

        return $cita->fresh();
    }

    public function delete(int $id): bool
    {
        $cita = Cita::findOrFail($id);

        return $cita->delete();
    }
}