<?php

namespace App\Http\Controllers;

use App\InscripcionCursos;
use App\InscripcionDetalles;
use DB;
use Illuminate\Http\Request;

class InscripcionCursosController extends Controller
{
    public function getInfoinProcess(Request $request){
        if (!$request->ajax()) return redirect('/');

        return InscripcionCursos::where([
                ['estado', 1],
                ['tipo_documento', '=', $request->tipo_documento],
                ['numero_documento', '=', $request->numero_documento]
            ])->get();
    }

    public function register(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $request->validate([
                'tipo_documento' => 'required|max:4',
                'numero_documento' => 'required|max:12',
                'nombres' => 'required|max:220|regex:/^[A-ZÀÁÉÍÓÚÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàáéíóúâçéèêëîïôûùüÿñæœ ]+$/',
                'apellidos' => 'required|max:220|regex:/^[A-ZÀÁÉÍÓÚÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàáéíóúâçéèêëîïôûùüÿñæœ ]+$/',
                'email' => 'required|email|max:150',
                'sede' => 'required|max:120',
                'programa_academico' => 'required|max:255',
                'cursos' => 'required',
            ]);

            $insCurso =  new InscripcionCursos();
            $insCurso->tipo_documento = $request->tipo_documento;
            $insCurso->numero_documento = $request->numero_documento;
            $insCurso->nombres = $request->nombres;
            $insCurso->apellidos = $request->apellidos;
            $insCurso->email = $request->email;
            $insCurso->sede = $request->sede;
            $insCurso->programa_academico = $request->programa_academico;
            $insCurso->estado = '0';
            $insCurso->save();

            //llega un string dividido por , entonces se crea un array
            $cursos = $request->cursos;

            foreach ($cursos as $key => $curso) {
                $insDet = new InscripcionDetalles();
                $insDet->ins_cursos_id = $insCurso->id;
                $insDet->curso_id = $curso;
                $insDet->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function saveFile(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
    }
}
