<?php

namespace AngryMoustache\Rambo\Http\Controllers;

use AngryMoustache\Rambo\RamboAuth;
use App\Http\Controllers\Controller;

class RamboAuthController extends Controller
{
    public function login()
    {
        return view('rambo::auth.login');
    }

    public function logout()
    {
        RamboAuth::logout();
        return redirect('/admin');
    }
}
