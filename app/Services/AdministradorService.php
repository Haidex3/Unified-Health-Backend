<?php

namespace App\Services;

use App\Models\Administrador;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class AdministradorService
{
    public function getAll(): Collection
    {
        return Administrador::all();
    }

    public function getById(int $id): Administrador
    {
        return Administrador::findOrFail($id);
    }

    public function getByCorreo(string $correo): ?Administrador
    {
        return Administrador::where('correo', $correo)
            ->first();
    }

    public function create(array $data): Administrador
    {
        return Administrador::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'RUT' => $data['RUT'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update(int $id, array $data): Administrador
    {
        $administrador = Administrador::findOrFail($id);

        $payload = [
            'nombre' => $data['nombre'] ?? $administrador->nombre,
            'correo' => $data['correo'] ?? $administrador->correo,
            'RUT' => $data['RUT'] ?? $administrador->RUT,
        ];

        if (isset($data['password'])) {
            $payload['password'] = Hash::make($data['password']);
        }

        $administrador->update($payload);

        return $administrador->fresh();
    }

    public function delete(int $id): bool
    {
        $administrador = Administrador::findOrFail($id);

        return $administrador->delete();
    }
}