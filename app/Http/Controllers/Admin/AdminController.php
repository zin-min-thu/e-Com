<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function setting()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.settings', compact('admin'));
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')) {

            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required'
            ]);

            $data = $request->all();
            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('/admin/dashboard');
            } else {
                session()->flash('error_message','Invalid email or passowrd.');
                return redirect()->back();
            }
        }
        return view('admin.login');
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin');
    }
}
