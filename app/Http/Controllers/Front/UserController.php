<?php

namespace App\Http\Controllers\Front;

use Mail;
use Auth;
use Hash;
use Session;
use App\Cart;
use App\User;
use App\Country;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use App\Mail\RegisterConfirmMail;
use App\Mail\ForgotPasswordMail;
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
            return redirect('user-account');
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

    public function forgotPassword(Request $request)
    {
        if($request->isMethod('post')) {
            $user = User::whereEmail($request->email)->first();
            if(is_null($user)) {
                session::flash('error_message', 'Your email does not exitst');
                return redirect()->back();
            }
            $random_password = Str::random(8);
            $user->update(['password' => bcrypt($random_password)]);

            $data = [
                'title' => 'Dear '.$user->name.',',
                'name' => $user->name,
                'password' => $random_password,
                'body' => "You new password is as below",
                'url' => url('login-register'),
            ];

            Mail::to($user->email)->send(new ForgotPasswordMail($data));
            session::flash('success_message', 'We have sent password to your email');
            return redirect('login-register');
        }

        return view('front.users.forgot_password');
    }

    public function userAccount(Request $request)
    {
        $countries = Country::get();

        $user = Auth::user();
        if($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255'
            ]);

            $input = $request->all();
            $user->update($input);

            session::flash('success_message', 'User account has been updated successfully.');
            return redirect('user-account');
        }

        return view('front.users.account', compact('user','countries'));
    }

    public function checkPassword(Request $request)
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $user = Auth::user();
            if(Hash::check($input['current_password'],$user->password)) {
                return "true";
            } else {
                return "false";
            }
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|same:confirm_password',
        ]);

        $input = $request->all();

        $user = Auth::user();
        if(Hash::check($input['current_password'],$user->password)) {
            $input['new_password'] = bcrypt($input['new_password']);
            $user->update(['password' => $input['new_password']]);
            session::flash('success_message', 'Your password has been updated successfully.');
            return redirect()->back();
        } else {
            session::flash('error_message', 'Your password is incorrect.');
            return redirect()->back();
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect('login-register')->with('success_message', 'User logout successfully.');
    }
}
