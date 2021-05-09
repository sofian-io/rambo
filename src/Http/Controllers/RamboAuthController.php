<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use AngryMoustache\Rambo\Facades\Rambo;
use App\Http\Controllers\Controller;

class RamboAuthController extends Controller
{
    public function login()
    {
        return view('rambo::auth.login');
    }

    public function logout()
    {
        Rambo::logout();
        return redirect('/admin');
    }
}
