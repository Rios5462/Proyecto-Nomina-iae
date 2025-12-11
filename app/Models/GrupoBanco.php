<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoBanco extends Model
{
    use HasFactory;

    protected $table = 'grupos_bancos'; 
    
    protected $fillable = [
        'codigo_banco_grupo', 
        'descripcion', 
        'sucursal', 
        'direccion', 
        'gerente', 
        'cuenta', 
        'texto_inicial_carta', 
        'texto_final_carta'
    ];
}