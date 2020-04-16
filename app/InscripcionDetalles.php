<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscripcionDetalles extends Model
{
    protected $table = 'inscripcion_detalles';

    protected $fillable = [
        'name', 'email', 'password',
    ];
}
