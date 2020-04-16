<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getData(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        return User::all();
    }
}
