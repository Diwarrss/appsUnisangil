<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscripcionPruebaController extends Controller
{
    public function downloadFile(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        return response()->download(public_path('/storage/formatos/FormatoPago-ExamenTIC.pdf'));
    }
}
