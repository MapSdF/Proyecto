<?php

namespace App\Http\Controllers;
use App\Models\SolFichaDs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolFichaDsController extends Controller
{
    public function index()
    {
        $solfichads = SolFichaDs::orderBy('no_solicitud', 'desc')->get();
        return view('solicitudes.index', compact('solfichads'));
    }

    public function create()
    {
        return view('solicitudes.create');
    }

    public function store(request $request)
    {
        $validatedData = $request->validate([
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
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'digits' => 'El campo :attribute debe tener :digits dígitos.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'unique' => 'Ya existe una solicitud con este número.',
        ]);

        try {
            SolFichaDs::create($validatedData);

            return redirect()
                ->route('solicitudes.index')
                ->with('success', 'Registro creado exitosamente ✅');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear el registro: ' . $e->getMessage());
        }
    }
    public function show($no_solicitud)
    {
        $solFichaDs = SolFichaDs::findOrFail($no_solicitud);
        return view('solicitudes.show', compact('solFichaDs'));
    }

   public function edit($no_solicitud)
    {   
        $solFichaDs = SolFichaDs::findOrFail($no_solicitud);
        return view('solicitudes.edit', compact('solFichaDs'));
    }

    public function update(request $request, SolFichaDs $no_solicitud)
    {
        $validatedData = $request->validate([
            'cuartos_casa' => 'required|integer|min:1|max:100',
            'personas_casa' => 'required|integer|min:1',
            'personas_dependen' => 'required|integer|min:0',
            'tipo_sangre' => 'requi9red|string|max:20',
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

        try {
           $no_solicitud->update($validatedData);


            return redirect()
                ->route('solicitudes.index')
                ->with('success', 'Registro actualizado correctamente ✅');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy($no_solicitud)
    {
        try {
            $solFichaDs = SolFichaDs::findOrFail($no_solicitud);
            $solFichaDs->delete();

            return redirect()
                ->route('solicitudes.index')
                ->with('success', 'Registro eliminado correctamente 🗑️');
        } catch (\Exception $e) {
            return redirect()
                ->route('solicitudes.index')
                ->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }
}