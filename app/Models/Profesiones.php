<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesiones extends Model
{
    protected $table = 'profesiones';

    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion',
    ];
}
