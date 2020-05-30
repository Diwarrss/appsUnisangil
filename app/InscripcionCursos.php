<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionCursos extends Model
{
    protected $table = 'inscripcion_cursos';

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'numero_id',
        'nombres',
        'apellidos',
        'email',
        'celular',
        'programa_academico',
        'url_comprobante',
        'estado',
        'sedes_id'
    ];

    //relatioships
    public function cursos()
    {
        //return sedes activas del usuario
        return $this->belongsToMany('App\Cursos','inscripcion_detalles','ins_cursos_id','curso_id');
    }

    public function sede()
    {
        //return sedes activas del usuario
        return $this->hasOne('App\Sede','id','sedes_id');
    }
}
