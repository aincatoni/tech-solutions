<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoApiController extends Controller
{
    public function index()
    {
        return response()->json(Proyecto::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
        ]);

        $proyecto = Proyecto::create($data);

        return response()->json($proyecto, 201);
    }

    public function show(string $id)
    {
        $proyecto = Proyecto::find($id);

        if (! $proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        return response()->json($proyecto, 200);
    }

    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        if (! $proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'max:255'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
        ]);

        $proyecto->update($data);

        return response()->json($proyecto->fresh(), 200);
    }

    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);

        if (! $proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado.'], 404);
        }

        $proyecto->delete();

        return response()->noContent();
    }
}
