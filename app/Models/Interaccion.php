<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaccion extends Model
{
    protected $fillable = ['perro_interesado_id', 'perro_candidato_id', 'preferencia'];

    /**
     * Obtiene las interacciones mutuas para un perro.
     */
    public function interaccionesMutuas()
    {
        return $this->hasMany(Interaccion::class, 'perro_candidato_id', 'perro_interesado_id')
                    ->where('preferencia', 'aceptado');
    }

}