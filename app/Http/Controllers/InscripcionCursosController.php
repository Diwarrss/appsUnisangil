<?php

namespace App\Http\Controllers;

use App\InscripcionCursos;
use App\InscripcionDetalles;
use Barryvdh\Reflection\DocBlock\Type\Collection;
use DB;
use Illuminate\Http\Request;
use Validator;

class InscripcionCursosController extends Controller
{
    public function getInfoinProcess(Request $request){
        if (!$request->ajax()) return redirect('/');

        $request->validate([
            'tipo_documento' => 'required|max:4',
            'numero_documento' => 'required|max:12'
        ]);

        $data = InscripcionCursos::with('cursos','sede')->where([
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

        //obtenemos los cursos que estan enviando
        $requestCursosIds = collect($request->cursos);

        $selectSolicitud = collect(InscripcionCursos::with('cursos')
            ->where('numero_documento','=',$request->numero_documento)
            ->whereIn('estado', array('0','1','2','3'))->get());

        //obtenemos los id que encontramos en array
        $arrayIdsIns= $selectSolicitud->pluck('id');


        //obtenemos la coleccion de detalles
        $selectCursos = collect(InscripcionDetalles::whereIn('ins_cursos_id', $arrayIdsIns)->get());

        //obtenemos los ids de cursos ya inscritos
        $arrayIdsCursos = $selectCursos->pluck('curso_id');

        //comparamos las dos colleciones si hay un valor return true
        $existeCurso = $arrayIdsCursos->intersect($requestCursosIds)->count();

        //dd($existeCurso);

        if ($existeCurso) {
            return response()->json([
                'message' => 'Ya hay una solicitud en proceso que contiene los cursos:',
                'data' => $selectSolicitud
            ], 409);
        } else {
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

    }

    public function saveFile(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $arrayData = $request->data;

        $request->validate([
            'data.*.[url_comprobante]' => 'sometimes|max:4098|mimes:jpg,png,PNG,pdf,JPG,jpeg',
        ]);
        foreach ($arrayData as $key => $value) {
            /* dd($value['url_comprobante'] ); */
            if ($value['url_comprobante'] != 'null') {
                try {
                    DB::beginTransaction();

                    $insCurso = InscripcionCursos::findOrFail($value['id']);

                    //crear nombre de imagen
                    $nameFile = time().'.'. $value['url_comprobante']->getClientOriginalExtension();

                    $insCurso->url_comprobante = '/storage/soportePagos/cursos/' . $nameFile;
                    $insCurso->estado = '2';
                    $insCurso->save();

                    //movemos la imagen a la carpeta definida
                    $value['url_comprobante']->move(public_path('/storage/soportePagos/cursos/'), $nameFile);

                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                }
            }
            /* else{
                return response()->json([
                    'message' => 'Ya hay una solicitud en proceso que contiene los cursos:'
                ], 409);
            } */
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
                $insCurso->nota_aprobado = $request->nota;
                $insCurso->save();
                break;
            case 'pay_error':
                $insCurso->estado = '4';
                $insCurso->nota_anulado = $request->nota;
                $insCurso->save();
                break;
            case 'pay_reset':
                $insCurso->estado = '1';
                $insCurso->url_comprobante = '';
                $insCurso->save();
                break;
            case 'data_delete':
                $insCurso->estado = '5';
                $insCurso->nota_anulado = $request->nota;
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

    public function downloadFile(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        return response()->download(public_path('/storage/calendarioCursos/Calendarios-202198-UNAB.pdf'));
    }
}
