<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioParqueoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_parqueos', function (Blueprint $table) {
            $table->id();
            $table->string('dia');
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table->binary('cerrado');
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
        Schema::dropIfExists('horarios_parqueos');
    }
}
