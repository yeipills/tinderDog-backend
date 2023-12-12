<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perro;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Interaccion;

class PerroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perros = Perro::all();
        return response()->json($perros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'url_foto' => 'required|url',
            'descripcion' => 'required',
        ]);

        $perro = Perro::create($validatedData);
        return response()->json($perro, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $perro = Perro::findOrFail($id);
            return response()->json($perro);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Perro no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $perro = Perro::findOrFail($id);

            $validatedData = $request->validate([
                'nombre' => 'required|max:255',
                'url_foto' => 'required|url',
                'descripcion' => 'required',
            ]);

            $perro->update($validatedData);
            return response()->json($perro);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Perro no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $perro = Perro::findOrFail($id);
            $perro->delete();
            return response()->json(null, 204); // No content
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Perro no encontrado'], 404);
        }
    }

    public function random()
    {
        $perro = Perro::inRandomOrder()->first(['id', 'nombre']);
        return response()->json($perro);
    }

    public function candidatos(Request $request)
    {
        $perroInteresadoId = $request->input('perro_id');
        $candidatos = Perro::where('id', '!=', $perroInteresadoId)->get(['id', 'nombre', 'url_foto', 'descripcion']);
        return response()->json($candidatos);
    }

    public function aceptar(Request $request)
    {
        $validatedData = $request->validate([
            'perro_id' => 'required|exists:perros,id',
        ]);

        $interaccion = Interaccion::create([
            'perro_id' => $validatedData['perro_id'],
            'accion' => 'aceptado',
            'fecha' => now(),
        ]);

        return response()->json(['message' => 'Perro aceptado', 'interaccion' => $interaccion], 200);
    }

    public function rechazar(Request $request)
    {
        $validatedData = $request->validate([
            'perro_id' => 'required|exists:perros,id',
        ]);

        $interaccion = Interaccion::create([
            'perro_id' => $validatedData['perro_id'],
            'accion' => 'rechazado',
            'fecha' => now(),
        ]);

        return response()->json(['message' => 'Perro rechazado', 'interaccion' => $interaccion], 200);
    }

    
}
