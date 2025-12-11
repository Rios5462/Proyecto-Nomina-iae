<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->id(); 
            // Campos visibles en el formulario
            $table->string('grupo', 50); // Campo 'Grupo'
            $table->string('codigo_banco', 50)->unique(); // Campo 'Codigo del Banco'
            $table->string('nombre', 255); // Campo 'Nombre'
            $table->string('sucursal', 100)->nullable(); // Campo 'Sucursal'
            $table->string('direccion', 255)->nullable(); // Campo 'Direccion'
            $table->string('gerente', 100)->nullable(); // Campo 'Gerente'
            $table->string('cuenta', 50)->nullable(); // Campo 'Cuenta'
            $table->enum('tipo_cuenta', ['Corriente', 'Ahorro', 'Otra'])->default('Corriente'); // Campo 'Tipo Cuenta'
            $table->text('texto_inicial_carta')->nullable(); // Campo 'Texto Inicial Carta'
            $table->text('texto_final_carta')->nullable(); // Campo 'Texto Final Carta'
            $table->timestamps();
            
            // Para asegurar la unicidad del par (Grupo + Codigo Banco), aunque Codigo_banco ya es único
            // $table->unique(['grupo', 'codigo_banco']); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('bancos');
    }
}