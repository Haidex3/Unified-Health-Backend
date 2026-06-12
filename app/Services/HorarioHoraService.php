<?php

namespace App\Services;

use App\Models\HorarioHora;
use Illuminate\Database\Eloquent\Collection;

class HorarioHoraService
{
    public function getAll(): Collection
    {
        return HorarioHora::with('medico')->get();
    }

    public function getById(int $id): HorarioHora
    {
        return HorarioHora::with('medico')
            ->findOrFail($id);
    }

    public function getByMedico(int $medicoId): Collection
    {
        return HorarioHora::where('medico_id', $medicoId)
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();
    }

    public function getDisponiblesByMedico(int $medicoId): Collection
    {
        return HorarioHora::where('medico_id', $medicoId)
            ->where('disponible', true)
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();
    }

    public function create(array $data): HorarioHora
    {
        return HorarioHora::create([
            'hora' => $data['hora'],
            'fecha' => $data['fecha'],
            'disponible' => $data['disponible'] ?? true,
            'medico_id' => $data['medico_id'],
        ]);
    }

    public function update(int $id, array $data): HorarioHora
    {
        $horario = HorarioHora::findOrFail($id);

        $horario->update([
            'hora' => $data['hora'] ?? $horario->hora,
            'fecha' => $data['fecha'] ?? $horario->fecha,
            'disponible' => $data['disponible'] ?? $horario->disponible,
            'medico_id' => $data['medico_id'] ?? $horario->medico_id,
        ]);

        return $horario->fresh();
    }

    public function marcarDisponible(int $id): HorarioHora
    {
        $horario = HorarioHora::findOrFail($id);

        $horario->update([
            'disponible' => true,
        ]);

        return $horario->fresh();
    }

    public function marcarNoDisponible(int $id): HorarioHora
    {
        $horario = HorarioHora::findOrFail($id);

        $horario->update([
            'disponible' => false,
        ]);

        return $horario->fresh();
    }

    public function delete(int $id): bool
    {
        $horario = HorarioHora::findOrFail($id);

        return $horario->delete();
    }
}