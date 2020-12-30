<?php

namespace App\Http\Controllers\Front;

use Mail;
use Auth;
use Hash;
use Session;
use App\Cart;
use App\User;
use App\Mail\RegisterMail;
use App\Mail\RegisterConfirmMail;
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

        $user = User::create($input);

        $data = [
                'title' => 'Dear '.$user->name.',',
                'name' => $user->name,
                'email' => $user->email,
                'body' => 'Your account has been created successfully.',
                'code' => base64_encode($user->email),
            ];

        Mail::to($user->email)->send(new RegisterMail($data));

        session::flash('success_message', 'We have sent activation link to your mail, please check and activate your account.');

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
            if(Auth::user()->status == 0) {
                session::flash('error_message', 'You need to activate your account, please check your email.');
                return redirect()->back();
            }

            if(!(empty(session('session_id')))) {
                $cart = Cart::where('session_id',session('session_id'))
                        ->update(['user_id' => Auth::user()->id]);
            }

            session::flash('success_message', 'User login successfully.');
            return redirect('cart');
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

    public function confirmEmail($email)
    {
        $email = base64_decode($email);
        $user = User::where('email',$email)->first();
        if(!empty($user)) {
            if($user->status == 1) {
                session::flash('error_message','Your email account is already activated, you can login now.');
                return redirect('login-register');
            } else {

                $user->update(['status' => 1]);

                $data = [
                    'title' => 'Dear '.$user->name.',',
                    'name' => $user->name,
                    'email' => $user->email,
                    'body' => 'Your account has been activated successfully.',
                    'url' => url('login-register'),
                ];

                Mail::to($user->email)->send(new RegisterConfirmMail($data));
                session::flash('success_message', 'Your account has been activated, you can login now.');

                return redirect('login-register');
            }
        } else {
            abort(404);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login-register')->with('success_message', 'User logout successfully.');
    }
}
