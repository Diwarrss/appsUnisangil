<?php

namespace App\Http\Controllers;

use App\Nivele;
use Illuminate\Http\Request;

class NiveleController extends Controller
{
    public function getAll(Request $request){
        if (!$request->ajax()) return redirect('/');
        return Nivele::all();
    }
}
