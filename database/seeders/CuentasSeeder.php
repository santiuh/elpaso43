<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cuenta;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuenta::create([
            'nombre' => 'AMSI',
            'balance' => 0,

        ]);

        Cuenta::create([
            'nombre' => 'Mercado Pago',
            'balance' => 0,
        ]);

        Cuenta::create([
            'nombre' => 'Adrián',
            'balance' => 0,
        ]);
        
    }
}
