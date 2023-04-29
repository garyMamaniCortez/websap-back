<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva');
            $table->foreign('id_reserva')->references('id')->on('reservas')
                                                            ->onUpdate('cascade')
                                                            ->onDelete('cascade')
                                                            ->nullable();
            $table->decimal('monto');
            $table->date('fecha_pago');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios')
                                                            ->onUpdate('cascade')
                                                            ->onDelete('cascade');
            $table->unsignedBigInteger('id_registro_parqueo');
            $table->foreign('id_registro_parqueo')->references('id')->on('registro_parqueos')
                                                                ->onUpdate('cascade')
                                                                ->onDelete('cascade')
                                                                ->nullable();
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
        Schema::dropIfExists('registro_pagos');
    }
}
