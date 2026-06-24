<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {}

    public function login(Request $request)
    {
        $request->validate([
            'RUT' => 'required',
            'password' => 'required',
        ]);

        $result = $this->authService->login($request->all());

        if (!$result['success']) {
            return response()->json([
                'message' => $result['message']
            ], 401);
        }

        return response()->json([
            'message' => $result['message'],
            'user' => $result['user'],
            'type' => $result['type'],
            'token' => $result['token'],
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }
}