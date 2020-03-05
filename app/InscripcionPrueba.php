<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionPrueba extends Model
{
    protected $fillable = [
        'empleado_id',
        'nombre_caja',
        'valor_inicial',
        'valor_producido',
        'valor_gastos',
        'estado_caja'
    ];
}
