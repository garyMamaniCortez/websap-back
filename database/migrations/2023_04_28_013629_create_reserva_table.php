<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTable extends Migration
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
            $table->unsignedBigInteger('cliente');
            $table->foreign('cliente')->references('id')->on('clientes')
                                                        ->onUpdate('cascade')
                                                        ->onDelete('cascade');
            $table->date('fecha_ini');
            $table->date('fecha_fin')->nullable();
            $table->unsignedBigInteger('sitio');
            $table->foreign('sitio')->references('id')->on('sitios')
                                                        ->onUpdate('cascade')
                                                        ->onDelete('cascade');
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
}
