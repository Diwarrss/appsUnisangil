<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionPrueba extends Model
{
    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres_apellidos',
        'email',
        'celular',
        'programa_academico',
        'url_comprobante',
        'estado',
        'sedes_id',
    ];
}
