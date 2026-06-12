<?php

namespace App\Http\Controllers;

use App\Services\HorarioHoraService;
use Illuminate\Http\Request;

class HorarioHoraController extends Controller
{
    public function __construct(
        private HorarioHoraService $horarioHoraService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->horarioHoraService->getAll()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'fields' => [
                'hora',
                'fecha',
                'disponible',
                'medico_id',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $horario = $this->horarioHoraService->create(
            $request->all()
        );

        return response()->json(
            $horario,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->horarioHoraService->getById(
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
            $this->horarioHoraService->update(
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
        $this->horarioHoraService->delete(
            (int) $id
        );

        return response()->json([
            'message' => 'Horario eliminado correctamente'
        ]);
    }
}