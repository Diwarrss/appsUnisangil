<?php

namespace App\Http\Controllers;

use App\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function getAll(Request $request){
        //if (!$request->ajax()) return redirect('/');
        return Cursos::with('sede')->where('cursos.estado','1')->get();
    }




}
