<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Carbon\Carbon;

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

    public function updateCurrentPassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            if($data['new_password'] == $data['confirm_password']) {
                Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'password' => bcrypt($data['new_password'])
                ]);
                session::flash('success_message', 'Password has been updated.');
            } else {
                session::flash('error_message', 'New password and confirm password not match.');
            }
        } else {
            session::flash('error_message', 'Current password is incorrect.');
        }
        return redirect()->back();
    }

    public function updateDetail(Request $request)
    {
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'mobile' => 'required|numeric',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = $request->all();

            if($request->hasFile('image')) {
                $image = $request->file('image');
                if($image->isValid()) {
                    //upload image and set image name
                    $date = Carbon::now()->format('Y-m-d-H:m:s');
                    $imageName = $date.".".$image->extension();
                    $path = '/images/admin_images/admin_photos';
                    $image->move(public_path($path), $imageName);
                }
            }else if(!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            } else {
                $imageName = "";
            }

            $admin->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'image' => $imageName
            ]);
            session::flash('success_message', 'Admin detail updated successful.');
        }

        return view('admin.update_detail', [
            'admin' => $admin
        ]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin');
    }
}
