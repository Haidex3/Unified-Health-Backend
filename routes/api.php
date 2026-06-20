<?php

use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\HorarioHoraController;
use App\Http\Controllers\Api\HospitalController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\PacienteController;

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