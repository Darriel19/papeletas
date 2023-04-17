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
        Schema::create('papeletas', function (Blueprint $table) {
            $table->id();
            $table->string('num_papeleta');
            $table->string('dni');
            $table->string('dependencia');
            $table->string('motivo');
            $table->string('lugar');
            $table->string('hora_salida');
            $table->string('hora_llegada');
            $table->string('observacion');
            $table->string('fecha_ini');
            $table->string('fecha_fin');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papeletas');
    }
};
