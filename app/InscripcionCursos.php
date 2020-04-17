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
        'sede',
        'programa_academico',
        'url_comprobante',
        'estado',
    ];

    //relatioships
    public function cursos()
    {
        //return sedes activas del usuario
        return $this->belongsToMany('App\Cursos','inscripcion_detalles','ins_cursos_id','curso_id');
    }
}
