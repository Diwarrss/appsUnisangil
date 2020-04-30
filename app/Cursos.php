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
        'sedes_id'
    ];

    public function sede()
    {
        //return sede del curso
        return $this->hasOne('App\Sede','id','sedes_id');
    }
}
