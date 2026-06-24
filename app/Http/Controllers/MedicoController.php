<?php

namespace App\Http\Controllers;

use App\Services\MedicoService;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __construct(
        private MedicoService $medicoService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->medicoService->getAll()
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
                'password',
                'celular',
                'hospital_id',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medico = $this->medicoService->create(
            $request->all()
        );

        return response()->json(
            $medico,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->medicoService->getById(
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
            $this->medicoService->update(
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
        $this->medicoService->delete(
            (int) $id
        );

        return response()->json([
            'message' => 'Médico eliminado correctamente'
        ]);
    }
}