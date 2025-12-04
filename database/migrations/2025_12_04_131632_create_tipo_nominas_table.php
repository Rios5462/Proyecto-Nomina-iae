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
        Schema::create('tipo_nominas', function (Blueprint $table) {
            // 1. Definir la clave primaria:
            $table->id();

            // 2. Definir la columna 'descripcion_nomina': string() para VARCHAR, con el límite de 100, y notNull() para NOT NULL.
            $table->string('descripcion_nomina', 100)->unique(); 

            // **OPCIONAL**: Si quieres las marcas de tiempo (created_at/updated_at), déjalas:
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_nominas');
    }
};
