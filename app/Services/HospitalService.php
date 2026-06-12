<?php

namespace App\Services;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Collection;

class HospitalService
{
    public function getAll(): Collection
    {
        return Hospital::with('medicos')->get();
    }

    public function getById(int $id): Hospital
    {
        return Hospital::with('medicos')
            ->findOrFail($id);
    }

    public function create(array $data): Hospital
    {
        return Hospital::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
        ]);
    }

    public function update(int $id, array $data): Hospital
    {
        $hospital = Hospital::findOrFail($id);

        $hospital->update([
            'nombre' => $data['nombre'] ?? $hospital->nombre,
            'correo' => $data['correo'] ?? $hospital->correo,
            'telefono' => $data['telefono'] ?? $hospital->telefono,
            'direccion' => $data['direccion'] ?? $hospital->direccion,
        ]);

        return $hospital->fresh();
    }

    public function delete(int $id): bool
    {
        $hospital = Hospital::findOrFail($id);

        return $hospital->delete();
    }
}