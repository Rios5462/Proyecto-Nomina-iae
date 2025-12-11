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
        Schema::create('tabulador_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('grupo', 50)->unique();
            $table->decimal('salario', 12, 1)->nullable();
            $table->decimal('bono_mes', 12, 1)->nullable();
            $table->decimal('bono_dia', 12, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabulador_categorias');
    }
};
