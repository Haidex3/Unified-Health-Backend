<?php

namespace App\Services;

use App\Models\Administrador;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(array $data): array
    {
        $rut = $data['RUT'];
        $password = $data['password'];

        $user = Administrador::where('RUT', $rut)->first();
        $type = 'administrador';

        if (!$user) {
            $user = Medico::where('RUT', $rut)->first();
            $type = 'medico';
        }

        if (!$user) {
            $user = Paciente::where('RUT', $rut)->first();
            $type = 'paciente';
        }

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Usuario no encontrado',
            ];
        }

        if (!Hash::check($password, $user->password)) {
            return [
                'success' => false,
                'message' => 'Contraseña incorrecta',
            ];
        }

        return [
            'success' => true,
            'message' => 'Login exitoso',
            'user' => $user,
            'type' => $type,
        ];
    }
}