<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AppController extends Controller
{
    public function login()
    {
        \Auth::logout();
        return \App::make('auth0')->login();
    }

    public function loginWidget()
    {
        \Auth::logout();
        return view('auth.login');
    }
}