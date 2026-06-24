<?php

namespace App\Services;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class PacienteService
{
    public function getAll(): Collection
    {
        return Paciente::with([
            'hospital',
            'citas',
        ])->get();
    }

    public function getById(int $id): Paciente
    {
        return Paciente::with([
            'hospital',
            'citas',
        ])->findOrFail($id);
    }

    public function getByHospital(int $hospitalId): Collection
    {
        return Paciente::where('hospital_id', $hospitalId)
            ->get();
    }

    public function create(array $data): Paciente
    {
        return Paciente::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'RUT' => $data['RUT'],
            'sexo' => $data['sexo'],
            'celular' => $data['celular'],
            'password' => Hash::make($data['password']),
            'hospital_id' => $data['hospital_id'],
        ]);
    }

    public function update(int $id, array $data): Paciente
    {
        $paciente = Paciente::findOrFail($id);

        $payload = [
            'nombre' => $data['nombre'] ?? $paciente->nombre,
            'correo' => $data['correo'] ?? $paciente->correo,
            'RUT' => $data['RUT'] ?? $paciente->RUT,
            'sexo' => $data['sexo'] ?? $paciente->sexo,
            'celular' => $data['celular'] ?? $paciente->celular,
            'hospital_id' => $data['hospital_id'] ?? $paciente->hospital_id,
        ];

        if (isset($data['password'])) {
            $payload['password'] = Hash::make($data['password']);
        }

        $paciente->update($payload);

        return $paciente->fresh();
    }

    public function delete(int $id): bool
    {
        $paciente = Paciente::findOrFail($id);

        return $paciente->delete();
    }
}