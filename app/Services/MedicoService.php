<?php

namespace App\Services;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class MedicoService
{
    public function getAll(): Collection
    {
        return Medico::with([
            'hospital',
            'horarios',
        ])->get();
    }

    public function getById(int $id): Medico
    {
        return Medico::with([
            'hospital',
            'horarios',
        ])->findOrFail($id);
    }

    public function getByHospital(int $hospitalId): Collection
    {
        return Medico::where('hospital_id', $hospitalId)
            ->get();
    }

    public function create(array $data): Medico
    {
        return Medico::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'RUT' => $data['RUT'],
            'contraseña' => Hash::make($data['contraseña']),
            'celular' => $data['celular'],
            'hospital_id' => $data['hospital_id'],
        ]);
    }

    public function update(int $id, array $data): Medico
    {
        $medico = Medico::findOrFail($id);

        $payload = [
            'nombre' => $data['nombre'] ?? $medico->nombre,
            'correo' => $data['correo'] ?? $medico->correo,
            'RUT' => $data['RUT'] ?? $medico->RUT,
            'celular' => $data['celular'] ?? $medico->celular,
            'hospital_id' => $data['hospital_id'] ?? $medico->hospital_id,
        ];

        if (isset($data['contraseña'])) {
            $payload['contraseña'] = Hash::make($data['contraseña']);
        }

        $medico->update($payload);

        return $medico->fresh();
    }

    public function delete(int $id): bool
    {
        $medico = Medico::findOrFail($id);

        return $medico->delete();
    }
}