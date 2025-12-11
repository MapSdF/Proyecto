<?php

namespace App\Http\Controllers\Api;

use App\Models\SolFichaDs; // CORREGIDO: era SolFichasDs
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SolFichasDsApiController extends Controller
{
    public function index(): JsonResponse
    {
        $solfichads = SolFichaDs::orderBy('no_solicitud', 'desc')->get(); // CORREGIDO
        return response()->json([
            'success' => true,
            'data' => $solfichads 
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'no_solicitud' => 'required|integer|unique:sol_ficha_ds,no_solicitud',
                'cuartos_casa' => 'required|integer|min:1|max:100',
                'personas_casa' => 'required|integer|min:1',
                'personas_dependen' => 'required|integer|min:0',
                'tipo_sangre' => 'required|string|max:20',
                'comunicar_con' => 'required|string|max:100',
                'calle_no' => 'required|string|max:80',
                'colonia' => 'required|string|max:40',
                'codigo_postal' => 'required|digits:5',
                'municipio' => 'required|string|max:50',
                'entidad_federativa' => 'required|string|max:50',
                'telefono' => 'required|digits:10',
                'lugar_trabajo' => 'required|string|max:50',
                'telefono_trabajo' => 'required|digits:10',
                'periodo' => 'required|string|max:5',
            ]);

            $solicitud = SolFichaDs::create($validated); // CORREGIDO
            
            return response()->json([
                'success' => true,
                'message' => 'Registro creado exitosamente',
                'data' => $solicitud
            ], 201);
            
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el registro',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $no_solicitud): JsonResponse
    {
        try {
            $solicitud = SolFichaDs::findOrFail($no_solicitud); // CORREGIDO
            return response()->json([
                'success' => true,
                'data' => $solicitud
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ficha no encontrada'
            ], 404);
        }
    }

    public function update(Request $request, string $no_solicitud): JsonResponse
    {
        try {
            $solicitud = SolFichaDs::findOrFail($no_solicitud); // CORREGIDO
            
            $validated = $request->validate([
                'cuartos_casa' => 'nullable|integer|min:1|max:100',
                'personas_casa' => 'nullable|integer|min:1',
                'personas_dependen' => 'nullable|integer|min:0',
                'tipo_sangre' => 'nullable|string|max:20',
                'comunicar_con' => 'nullable|string|max:100',
                'calle_no' => 'nullable|string|max:80',
                'colonia' => 'nullable|string|max:40',
                'codigo_postal' => 'nullable|digits:5',
                'municipio' => 'nullable|string|max:50',
                'entidad_federativa' => 'nullable|string|max:50',
                'telefono' => 'nullable|digits:10',
                'lugar_trabajo' => 'nullable|string|max:50',
                'telefono_trabajo' => 'nullable|digits:10',
                'periodo' => 'nullable|string|max:5',
            ]);

            $solicitud->update($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'Registro actualizado correctamente',
                'data' => $solicitud
            ]);
            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ficha no encontrada'
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $no_solicitud): JsonResponse
    {
        try {
            $solicitud = SolFichaDs::findOrFail($no_solicitud); // CORREGIDO
            $solicitud->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Registro eliminado correctamente'
            ], 200);
            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ficha no encontrada'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}