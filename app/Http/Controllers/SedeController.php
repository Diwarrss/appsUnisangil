<?php

namespace App\Http\Controllers;

use App\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function getAll(Request $request)
    {
        return Sede::all();
    }
}
