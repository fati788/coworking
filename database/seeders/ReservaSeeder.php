<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservas')->insert(['telefono'=> '67465252', 'fecha'=>'2025-11-23' , 'hora'=> '9:00' , 'numpersonas' => 4 , 'estado'=> 'pendiente' , 'sala_id'=>6 ,'user_id'=>1
            ,'created_at' => now(),'updated_at' => now()]);
        DB::table('reservas')->insert(['telefono'=> '67465235', 'fecha'=>'2025-11-28' , 'hora'=> '10:00' , 'numpersonas' => 5 , 'estado'=> 'pendiente' , 'sala_id'=>7 ,'user_id'=>2
            ,'created_at' => now(),'updated_at' => now()]);

    }
}
