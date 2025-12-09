<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAusencia extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     * Si tu migración se llama "tipo_ausencias", Laravel lo detecta automáticamente.
     * Pero lo declaramos explícitamente para mayor claridad.
     */
    protected $table = 'tipos_ausencia';

    /**
     * Campos que se pueden asignar masivamente (mass assignment).
     */
    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    /**
     * Opcional: si no quieres timestamps (created_at, updated_at).
     * Si tu tabla los tiene, puedes dejarlo en true (por defecto).
     */
    public $timestamps = true;
}