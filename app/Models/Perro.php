<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perro extends Model
{
    use HasFactory;

    // Definir la tabla si es diferente del nombre por defecto
    protected $table = 'perros';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'url_foto', 'descripcion'];

    // Si no quieres usar las marcas de tiempo de Eloquent (created_at y updated_at)
    // public $timestamps = false;
}
