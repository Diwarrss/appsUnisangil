<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionCursos extends Model
{
    protected $table = 'inscripcion_cursos';

    protected $fillable = [
        'name', 'email', 'password',
    ];
}
