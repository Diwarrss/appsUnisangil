<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuzonSugerencia extends Model
{
    protected $fillable = [
        'nombres',
        'celular',
        'email',
        'tipo',
        'descripcion',
    ];
}
