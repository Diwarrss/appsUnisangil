<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'nrc',
        'fecha_inicio_inscripcion',
        'fecha_fin_inscripcion',
        'estado',
    ];
}
