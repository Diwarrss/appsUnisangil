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
        $sede = $request->sede;

        if($sede){
            switch ($criterio) {
                case 'num_doc':
                    return InscripcionCursos::with('cursos', 'sede')
                    ->where([['inscripcion_cursos.numero_documento', 'like', "%$buscar%"], ['sedes_id', $sede]])
                    ->orderBy('created_at', 'desc')
                    ->paginate($cant);
                    break;
                case 'id_unab':
                    return InscripcionCursos::with('cursos', 'sede')
                    ->where([['inscripcion_cursos.numero_id', 'like', "%$buscar%"], ['sedes_id', $sede]])
                    ->orderBy('created_at', 'desc')
                    ->paginate($cant);
                    break;
                case 'email':
                    return InscripcionCursos::with('cursos', 'sede')
                    ->where([['inscripcion_cursos.email', 'like', "%$buscar%"], ['sedes_id', $sede]])
                    ->orderBy('created_at', 'desc')
                    ->paginate($cant);
                    break;
                case 'nombres':
                    return InscripcionCursos::with('cursos', 'sede')
                    ->where([['inscripcion_cursos.nombres', 'like', "%$buscar%"], ['sedes_id', $sede]])
                    ->orderBy('created_at', 'desc')
                    ->paginate($cant);
                    break;
                case 'celular':
                    return InscripcionCursos::with('cursos', 'sede')
                    ->where([['inscripcion_cursos.celular', 'like', "%$buscar%"], ['sedes_id', $sede]])
                    ->orderBy('created_at', 'desc')
                    ->paginate($cant);
                    break;

                default:
                    # code...
                    break;
            }
        }
        //sin sede
        switch ($criterio) {
            case 'num_doc':
                return InscripcionCursos::with('cursos', 'sede')
                ->where('inscripcion_cursos.numero_documento', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'id_unab':
                return InscripcionCursos::with('cursos', 'sede')
                ->where('inscripcion_cursos.numero_id', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'email':
                return InscripcionCursos::with('cursos', 'sede')
                ->where('inscripcion_cursos.email', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'nombres':
                return InscripcionCursos::with('cursos', 'sede')
                ->where('inscripcion_cursos.nombres', 'like', "%$buscar%")
                ->orderBy('created_at', 'desc')
                ->paginate($cant);
                break;
            case 'celular':
                return InscripcionCursos::with('cursos', 'sede')
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
                'sede' => 'required',
                'programa_academico' => 'required|max:255',
                'cursos', 'sede' => 'required',
            ]);

            $insCurso =  new InscripcionCursos();
            $insCurso->tipo_documento = $request->tipo_documento;
            $insCurso->numero_documento = $request->numero_documento;
            $insCurso->numero_id = $request->numero_id;
            $insCurso->nombres = $request->nombres;
            $insCurso->apellidos = $request->apellidos;
            $insCurso->email = $request->email;
            $insCurso->celular = $request->celular;
            $insCurso->sedes_id = $request->sede['id'];
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
                'url_comprobante' => 'required|max:4098|mimes:jpg,png,pdf',
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

    public function updateState(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $type = $request->type;

        $insCurso = InscripcionCursos::findOrFail($request->id);

        switch ($type) {
            case 'mail_send':
                $insCurso->estado = '1';
                $insCurso->save();
                break;
            case 'pay_success':
                $insCurso->estado = '3';
                $insCurso->save();
                break;
            case 'pay_error':
                $insCurso->estado = '4';
                $insCurso->save();
                break;
            case 'pay_reset':
                $insCurso->estado = '1';
                $insCurso->url_comprobante = '';
                $insCurso->save();
                break;

            default:
                # code...
                break;
        }
    }

    public function downloadPay(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $file= public_path(). $request->url_comprobante;
        $extension = substr($file, -3);

        $headers = [
            'Content-Type' => "application/$extension",
        ];

        return response()->download($file, '', $headers);
    }
}
