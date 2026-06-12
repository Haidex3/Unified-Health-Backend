<?php

namespace App\Http\Controllers;

use App\Services\HospitalService;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function __construct(
        private HospitalService $hospitalService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->hospitalService->getAll()
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
                'telefono',
                'direccion',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hospital = $this->hospitalService->create(
            $request->all()
        );

        return response()->json(
            $hospital,
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->hospitalService->getById(
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
            $this->hospitalService->update(
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
        $this->hospitalService->delete(
            (int) $id
        );

        return response()->json([
            'message' => 'Hospital eliminado correctamente'
        ]);
    }
}