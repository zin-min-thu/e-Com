<?php

namespace App\Http\Controllers\Front;

use Auth;
use Hash;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function loginRegister()
    {
        return view('front.users.login_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:4',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        session::flash('success_message', 'User created successufly.');

        return redirect()->back();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect('cart')->with('success_message', 'User login successfully.');
        } else {
            session::flash('error_message','Invalid email or password please try again!.');
            return redirect()->back();
        }
    }

    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $userCount = User::where('email',$data['email'])->count();
        if($userCount > 0) {
            return 'false';
        } else {
            return 'true';
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login-register')->with('success_message', 'User logout successfully.');
    }
}
