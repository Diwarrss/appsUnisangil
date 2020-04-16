<?php

namespace App\Http\Controllers;

use App\BuzonSugerencia;
use DB;
use Illuminate\Http\Request;

class BuzonSugerenciaController extends Controller
{
    public function save(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $request->validate([
                'data.nombres' => 'max:120|nullable|regex:/^[A-ZÀÁÉÍÓÚÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàáéíóúâçéèêëîïôûùüÿñæœ ]+$/',
                'data.celular' => 'max:10|regex:/\d/|nullable',
                'data.email' => 'max:40|email|nullable',
                'data.tipo' => 'required|max:20',
                'data.descripcion' => 'required'
            ]);
            $buzon =  new BuzonSugerencia();
            $buzon->nombres = $request->data['nombres'];
            $buzon->celular = $request->data['celular'];
            $buzon->email = $request->data['email'];
            $buzon->tipo = $request->data['tipo'];
            $buzon->descripcion = $request->data['descripcion'];
            $buzon->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
