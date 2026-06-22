<?php

namespace App\Http\Controllers;

use App\Services\PacienteService;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct(
        private PacienteService $pacienteService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->pacienteService->getAll()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'fields' => [
                'nombre',
                'correo',
                'RUT',
                'sexo',
                'celular',
                'password',
                'hospital_id',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paciente = $this->pacienteService->create(
            $request->all()
        );

        return response()->json(
            $paciente,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->pacienteService->getById(
                (int) $id
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json([
            'message' => 'Not implemented'
        ], 501);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        string $id
    ) {
        return response()->json(
            $this->pacienteService->update(
                (int) $id,
                $request->all()
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->pacienteService->delete(
            (int) $id
        );

        return response()->json([
            'message' => 'Paciente eliminado correctamente'
        ]);
    }
}