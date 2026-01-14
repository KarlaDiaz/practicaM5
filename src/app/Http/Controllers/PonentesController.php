<?php

namespace App\Http\Controllers;

use App\Models\Ponentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PonentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todos los recursos
        $ponentes = Ponentes::all();
        // Retornar los recursos recuperados
        $respuesta = [
            'ponentes' => $ponentes,
            'status' => 200,
        ];
        return response()->json($respuesta);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar que la petición contenga todos los datos necesarios
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',
        ]);
        // Si la petición no contiene todos los datos necesarios, retornar un mensaje de error
        if ($validator->fails()) {
            $respuesta = [
                'message' => 'Datos faltantes',
                'status' => 400,
            ];
            return response()->json($respuesta, 400);
        }

        // Crear un nuevo recurso con los datos de la petición
        $ponente = Ponentes::create([
            'nombre' => $request->nombre,
            'biografia' => $request->biografia,
            'especialidad' => $request->especialidad,
        ]);
        
        // Si el recurso no se pudo crear, retornar un mensaje de error
        if (!$ponente) {
            $respuesta = [
                'message' => 'Error al crear el ponente',
                'status' => 500,
            ];
            return response()->json($respuesta, 500);
        }

        // Retornar el recurso creado
        $respuesta = [
            'ponente' => $ponente,
            'status' => 201,
        ];
        return response()->json($respuesta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ponente = Ponentes::find($id);
        if (!$ponente) {
            $respuesta = [
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ];
            return response()->json($respuesta, 404);
        }

        $respuesta = [
            'ponente' => $ponente,
            'status' => 200,
        ];
        return response()->json($respuesta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ponente = Ponentes::find($id);
        if (!$ponente) {
            $respuesta = [
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ];
            return response()->json($respuesta, 404);
        }

        // Validar que la petición contenga todos los datos necesarios
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',
        ]);
        // Si la petición no contiene todos los datos necesarios, retornar un mensaje de error
        if ($validator->fails()) {
            $respuesta = [
                'message' => 'Datos faltantes',
                'status' => 400,
            ];
            return response()->json($respuesta, 400);
        }

        // Actualizar el recurso con los datos de la petición
        $ponente->update([
            'nombre' => $request->nombre,
            'biografia' => $request->biografia,
            'especialidad' => $request->especialidad,
        ]);

        // Retornar el recurso actualizado
        $respuesta = [
            'ponente' => $ponente,
            'status' => 200,
        ];
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ponente = Ponentes::find($id);
        if (!$ponente) {
            $respuesta = [
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ];
            return response()->json($respuesta, 404);
        }

        $ponente->delete();

        $respuesta = [
            'message' => 'Ponente eliminado correctamente',
            'status' => 200,
        ];
        return response()->json($respuesta);
    }
}
