<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    protected $table = 'bancos'; 
    
    protected $fillable = [
        'grupo', 
        'codigo_banco', 
        'nombre', 
        'sucursal', 
        'direccion', 
        'gerente', 
        'cuenta', 
        'tipo_cuenta',
        'texto_inicial_carta', 
        'texto_final_carta'
    ];
}