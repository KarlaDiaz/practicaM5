<?php

namespace App\Http\Controllers;

use App\Models\Asistentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsistentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asistentes = Asistentes::all();
        $respuesta = [
            'asistentes' => $asistentes,
            'status' => 'success',
        ];
        return response()->json($respuesta);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:asistentes',
            'telefono' => 'nullable|string|max:20',
            'evento_id' => 'required|exists:eventos,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $asistente = Asistentes::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Asistente creado exitosamente',
            'data' => $asistente
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistente = Asistentes::find($id);
        if (!$asistente) {
            return response()->json([
                'status' => 'error',
                'message' => 'Asistente no encontrado'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $asistente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asistente = Asistentes::find($id);
        if (!$asistente) {
            return response()->json([
                'status' => 'error',
                'message' => 'Asistente no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:asistentes,email,' . $id,
            'telefono' => 'nullable|string|max:20',
            'evento_id' => 'required|exists:eventos,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $asistente->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Asistente actualizado exitosamente',
            'data' => $asistente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistente = Asistentes::find($id);
        if (!$asistente) {
            return response()->json([
                'status' => 'error',
                'message' => 'Asistente no encontrado'
            ], 404);
        }

        $asistente->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Asistente eliminado exitosamente'
        ]);
    }
}
