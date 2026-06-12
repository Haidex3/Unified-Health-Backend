<?php

namespace App\Http\Controllers;

use App\Services\AdministradorService;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function __construct(
        private AdministradorService $administradorService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->administradorService->getAll()
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
                'contraseña',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $administrador = $this->administradorService->create(
            $request->all()
        );

        return response()->json(
            $administrador,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->administradorService->getById(
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
            $this->administradorService->update(
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
        $this->administradorService->delete(
            (int) $id
        );

        return response()->json([
            'message' => 'Administrador eliminado correctamente'
        ]);
    }
}