<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hotele;

class HotelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotele::create([
            'nombre'=> 'El Paso 43',
            'balance' => 0,
        ]);

        Hotele::create([
            'nombre' => 'El Paso 54',
            'balance' => 0,
        ]);
    }
}
