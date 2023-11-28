<?php

namespace App\Http\Controllers;

use App\Models\Interaccion;
use App\Models\Perro;
use App\Http\Requests\StoreInteraccionRequest;
use Illuminate\Http\Request;

class InteraccionController extends Controller
{
    /**
     * Almacena una nueva interacción en la base de datos.
     *
     * @param  \App\Http\Requests\StoreInteraccionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInteraccionRequest $request)
    {
        $interaccion = Interaccion::create($request->validated());

        // Verificar si hay un match
        $match = $this->verificarMatch($interaccion);

        return response()->json([
            'interaccion' => $interaccion,
            'match' => $match
        ], 201);
    }

    /**
     * Muestra los matches del perro especificado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function matches(Request $request)
    {
        $perroId = $request->input('perro_id');
    
        $matches = Interaccion::where('perro_interesado_id', $perroId)
            ->whereHas('interaccionesMutuas', function ($query) use ($perroId) {
                $query->where('perro_candidato_id', $perroId)
                      ->where('preferencia', 'aceptado');
            })
            ->with('perroCandidato')
            ->get();
    
        return response()->json($matches);
    }
    

    /**
     * Verifica si hay un match entre dos perros.
     *
     * @param  \App\Models\Interaccion  $interaccion
     * @return bool
     */
    private function verificarMatch(Interaccion $interaccion)
    {
        // Verificar si el perro candidato también ha aceptado al perro interesado
        return Interaccion::where('perro_interesado_id', $interaccion->perro_candidato_id)
                          ->where('perro_candidato_id', $interaccion->perro_interesado_id)
                          ->where('preferencia', 'aceptado')
                          ->exists();
    }
}
