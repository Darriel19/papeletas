<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('cae_coduni');
            $table->string('tarjeta');
            $table->string('apepater');
            $table->string('apemater');
            $table->string('nombre');
            $table->string('le');
            $table->string('flag');
            $table->string('horario');
            $table->string('plaza');
            $table->string('cond');
            $table->string('reglab');
            $table->string('nivel_mag');
            $table->string('horas');
            $table->string('cargo');
            $table->string('cod_cargo');
            $table->string('sector');
            $table->string('oficina');
            $table->string('observa');
            $table->string('codigo');
            $table->string('fecha');
            $table->string('faltas_m');
            $table->string('faltas_t');
            $table->string('anormal');
            $table->string('vaca1');
            $table->string('vaca2');
            $table->string('salud');
            $table->string('rm574');
            $table->string('justm');
            $table->string('justt');
            $table->string('ntardanza');
            $table->string('atardanza');
            $table->string('establec');
            $table->string('periodo');
            $table->string('apellidos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
