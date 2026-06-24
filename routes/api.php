<?php
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HorarioHoraController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;

Route::apiResource(
    'administradores',
    AdministradorController::class
);

Route::apiResource(
    'citas',
    CitaController::class
);

Route::apiResource(
    'horario-horas',
    HorarioHoraController::class
);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::apiResource(
    'hospitales',
    HospitalController::class
);

Route::apiResource(
    'medicos',
    MedicoController::class
);

Route::apiResource(
    'pacientes',
    PacienteController::class
);