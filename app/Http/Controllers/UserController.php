<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getData(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        return User::with('sede')->where('users.id', '=', Auth::user()->id)->get();
    }
}
