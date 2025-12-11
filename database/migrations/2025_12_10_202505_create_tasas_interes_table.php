<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasasInteresTable extends Migration
{
    public function up()
    {
        Schema::create('tasas_interes', function (Blueprint $table) {
            $table->id(); 
            // Campos de la interfaz
            $table->year('año'); // Campo 'Año'
            $table->unsignedTinyInteger('mes'); // Campo 'Mes' (1 a 12)
            $table->decimal('tasa', 5, 2); // Campo 'Tasa' (ej. 10.50)
            
            // Unicidad: Solo puede haber una tasa por mes y año
            $table->unique(['año', 'mes']); 
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasas_interes');
    }
}