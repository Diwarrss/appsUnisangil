<?php

namespace App\Http\Controllers;

use App\InscripcionPrueba;
use App\PruebasNivele;
use DB;
use Illuminate\Http\Request;

class InscripcionPruebaController extends Controller
{
    public function downloadFile(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        return response()->download(public_path('/storage/formatos/FormatoPago-ExamenTIC.pdf'));
    }

    public function save(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $request->validate([
                'tipo_documento' => 'required|max:4',
                'numero_documento' => 'required|max:12',
                'nombres_apellidos' => 'required|max:220|regex:/^[A-ZÀÁÉÍÓÚÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàáéíóúâçéèêëîïôûùüÿñæœ ]+$/',
                'email' => 'required|email|max:150',
                'celular' => 'required|max:11',
                'programa_academico' => 'required|max:255',
                'niveles' => 'required',
                'url_comprobante' => 'required|max:4098|mimes:jpeg,png,pdf',
            ]);

            //crear nombre de imagen
            $nameFile = time().'.'. $request->url_comprobante->getClientOriginalExtension();

            $insPrueba =  new InscripcionPrueba();
            $insPrueba->tipo_documento = $request->tipo_documento;
            $insPrueba->numero_documento = $request->numero_documento;
            $insPrueba->nombres_apellidos = $request->nombres_apellidos;
            $insPrueba->email = $request->email;
            $insPrueba->celular = $request->celular;
            $insPrueba->programa_academico = $request->programa_academico;
            $insPrueba->url_comprobante = '/storage/soportePagos/pruebas/' . $nameFile;
            $insPrueba->estado = '0';
            $insPrueba->save();

            //movemos la imagen a la carpeta definida
            $request->url_comprobante->move(public_path('/storage/soportePagos/pruebas/'), $nameFile);

            //llega un string dividido por , entonces se crea un array
            $niveles = explode(",", $request->niveles);

            if ($request->programa_academico == 'Ingeniería Financiera (UNAB)' || $request->programa_academico == 'Psicología (UNAB)') {
                foreach ($niveles as $key => $nvl) {
                    $pruebaNivel = new PruebasNivele();
                    $pruebaNivel->ins_pruebas_id = $insPrueba->id;
                    $pruebaNivel->nivel_id = $nvl;
                    $pruebaNivel->save();
                }
            }else{
                $pruebaNivel = new PruebasNivele();
                $pruebaNivel->ins_pruebas_id = $insPrueba->id;
                $pruebaNivel->nivel_id = $request->niveles;
                $pruebaNivel->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
