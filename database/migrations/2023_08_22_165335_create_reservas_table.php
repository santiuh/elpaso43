<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hoteles');
            $table->unsignedBigInteger('habitacion_id');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones');
            $table->date('desde');
            $table->date('hasta');
            $table->unsignedBigInteger('personas')->nullable();
            $table->unsignedBigInteger('noches')->nullable();
            $table->unsignedBigInteger('precio_noche')->nullable();
            $table->unsignedBigInteger('seña')->nullable();
            $table->unsignedBigInteger('seña_cuenta')->nullable();
            $table->foreign('seña_cuenta')->references('id')->on('cuentas');
            $table->unsignedBigInteger('pago_debe')->nullable();
            $table->date('pago_cancelado_fecha')->nullable();
            $table->unsignedBigInteger('pago_cancelado_cuenta')->nullable();
            $table->foreign('pago_cancelado_cuenta')->references('id')->on('cuentas');
            $table->string('pasajero')->nullable();
            $table->string('pasajero_contacto')->nullable();
            $table->string('nota')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
