<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TabuladorCategorias extends Model
{
    use HasFactory;

    protected $table = 'tabulador_categorias';

    protected $primarykey = 'id';

    protected $fillable = [
        'grupo',
        'salario',
        'bono_mes',
        'bono_dia',
    ];
}
