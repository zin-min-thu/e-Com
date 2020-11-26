<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginRegister()
    {
        return view('front.users.login_register');
    }

    public function register(Request $request)
    {
        return "!Currently working on this feature.";
    }

    public function login(Request $request)
    {
        return "!Currently working on this feature.";
    }
}
