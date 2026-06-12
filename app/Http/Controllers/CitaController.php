<?php

namespace App\Http\Controllers;

use App\Services\CitaService;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function __construct(
        private CitaService $citaService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->citaService->getAll()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'fields' => [
                'fecha',
                'detalles',
                'conclusiones',
                'horario_hora_id',
                'paciente_id',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cita = $this->citaService->create(
            $request->all()
        );

        return response()->json(
            $cita,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->citaService->getById(
                (int) $id
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        string $id
    ) {
        return response()->json(
            $this->citaService->update(
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
        $this->citaService->delete(
            (int) $id
        );

        return response()->json([
            'message' => 'Cita eliminada correctamente'
        ]);
    }
}