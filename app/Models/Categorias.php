<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Categorias extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $primarykey = 'id';

    protected $fillable = ['descripcion'];
}
