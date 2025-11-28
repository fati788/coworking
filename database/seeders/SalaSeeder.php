<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salas')->insert(['capacidad' => 10, 'nombre' => 'Sala 1', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 8, 'nombre' => 'Sala 2', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 7, 'nombre' => 'Sala 3', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 6, 'nombre' => 'Sala 3', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 5, 'nombre' => 'Sala 3', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 4, 'nombre' => 'Sala 3', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 3, 'nombre' => 'Sala 3', 'descripcion' => 'Elegante y moderna']);
        DB::table('salas')->insert(['capacidad' => 3, 'nombre' => 'Sala 3', 'descripcion' => 'Elegante y moderna']);

    }
}
