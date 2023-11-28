<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perro;

class PerroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perro::create([
            'nombre' => 'Firulais',
            'url_foto' => 'http://ejemplo.com/firulais.jpg',
            'descripcion' => 'Un perro amigable y juguetón.'
        ]);

        Perro::create([
            'nombre' => 'Rex',
            'url_foto' => 'http://ejemplo.com/rex.jpg',
            'descripcion' => 'Un perro guardián y leal.'
        ]);

        // Agrega más perros según necesites
    }
}
