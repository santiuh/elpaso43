<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserva::create([
            'hotel_id'=> 1,
            'habitacion_id'=> 3,
            'desde' => '2023-08-22',
            'hasta' => '2023-08-26',
            'noches' => 4,
            'precio_noche' => 30000,
            'seña' => 25000,
            'seña_cuenta' => 1,
            'pago_debe' => 105000,
            'pago_cancelado_fecha' => '2023-10-19',
            'pago_cancelado_cuenta' => 2,
            'pasajero' => 'Julio',
            'pasajero_contacto' => '341-391-3140',
            'nota' => 'quiere desayuno'

        ]);
    }
}
