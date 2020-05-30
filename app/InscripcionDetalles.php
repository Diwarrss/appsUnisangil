<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionDetalles extends Model
{
    protected $table = 'inscripcion_detalles';

    protected $fillable = [
        'ins_cursos_id',
        'curso_id',
    ];
}
