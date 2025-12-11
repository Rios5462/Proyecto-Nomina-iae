<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposBancosTable extends Migration
{
    public function up()
    {
        Schema::create('grupos_bancos', function (Blueprint $table) {
            $table->id(); 
            // Código del Banco (Grupo) - Lo hacemos único para identificación
            $table->string('codigo_banco_grupo', 50)->unique(); 
            $table->string('descripcion', 255); 
            $table->string('sucursal', 100)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('gerente', 100)->nullable();
            $table->string('cuenta', 50)->nullable();
            $table->text('texto_inicial_carta')->nullable();
            $table->text('texto_final_carta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos_bancos');
    }
}