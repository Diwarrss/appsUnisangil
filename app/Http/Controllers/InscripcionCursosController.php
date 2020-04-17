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

        $request->validate([
            'tipo_documento' => 'required|max:4',
            'numero_documento' => 'required|max:12'
        ]);

        $data = InscripcionCursos::where([
            ['estado', '=', '1'],
            ['tipo_documento', '=', $request->tipo_documento],
            ['numero_documento', '=', $request->numero_documento]
        ])->get();

        /* if (!$request->tipo_documento && !$request->numero_documento && $request->numero_id) {
            $request->validate([
                'numero_id' => 'required|max:9'
            ]);
            $data = InscripcionCursos::where([
                ['estado', '=', '1'],
                ['numero_id', '=', $request->numero_id]
            ])->get();
        }else if($request->tipo_documento && $request->numero_documento && !$request->numero_id)
        {
            $request->validate([
                'tipo_documento' => 'required|max:4',
                'numero_documento' => 'required|max:12'
            ]);
            $data = InscripcionCursos::where([
                ['estado', '=', '1'],
                ['tipo_documento', '=', $request->tipo_documento],
                ['numero_documento', '=', $request->numero_documento]
            ])->get();
        }else{
            $request->validate([
                'tipo_documento' => 'required|max:4',
                'numero_documento' => 'required|max:12',
                'numero_id' => 'required|max:9'
            ]);
        } */

        if (count($data) > 0) {
            return $data;
        }else{
            return response()->json([
                'message' => 'Not results'], 404);
        }
    }

    public function getDataTable(Request $request){
        if (!$request->ajax()) return redirect('/');
        $criterio = $request->criterio;
        $buscar = $request->buscar;
        $cant = $request->cant;

        switch ($criterio) {
            case 'num_doc':
                return InscripcionCursos::with('cursos')
                ->where('inscripcion_cursos.numero_documento', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'id_unab':
                return InscripcionCursos::with('cursos')
                ->where('inscripcion_cursos.numero_id', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'email':
                return InscripcionCursos::with('cursos')
                ->where('inscripcion_cursos.email', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'nombres':
                return InscripcionCursos::with('cursos')
                ->where('inscripcion_cursos.nombres', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'celular':
                return InscripcionCursos::with('cursos')
                ->where('inscripcion_cursos.celular', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;

            default:
                # code...
                break;
        }
    }

    public function register(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $request->validate([
                'tipo_documento' => 'required|max:4',
                'numero_documento' => 'required|max:12',
                'numero_id' => 'required|max:9',
                'nombres' => 'required|max:220|regex:/^[A-ZÀÁÉÍÓÚÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàáéíóúâçéèêëîïôûùüÿñæœ ]+$/',
                'apellidos' => 'required|max:220|regex:/^[A-ZÀÁÉÍÓÚÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàáéíóúâçéèêëîïôûùüÿñæœ ]+$/',
                'email' => 'required|email|max:150',
                'celular' => 'required|max:11',
                'sede' => 'required|max:120',
                'programa_academico' => 'required|max:255',
                'cursos' => 'required',
            ]);

            $insCurso =  new InscripcionCursos();
            $insCurso->tipo_documento = $request->tipo_documento;
            $insCurso->numero_documento = $request->numero_documento;
            $insCurso->numero_id = $request->numero_id;
            $insCurso->nombres = $request->nombres;
            $insCurso->apellidos = $request->apellidos;
            $insCurso->email = $request->email;
            $insCurso->celular = $request->celular;
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

        try {
            DB::beginTransaction();

            $insCurso = InscripcionCursos::findOrFail($request->id);

            $request->validate([
                'url_comprobante' => 'required|max:4098|mimes:jpeg,png,pdf',
            ]);

            //crear nombre de imagen
            $nameFile = time().'.'. $request->url_comprobante->getClientOriginalExtension();

            $insCurso->url_comprobante = '/storage/soportePagos/cursos/' . $nameFile;
            $insCurso->estado = '2';
            $insCurso->save();

            //movemos la imagen a la carpeta definida
            $request->url_comprobante->move(public_path('/storage/soportePagos/cursos/'), $nameFile);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
