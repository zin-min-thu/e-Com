<?php

namespace App\Http\Controllers\Admin;

use DB;
use Session;
use App\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::get();

        return view('admin.settings.admins.index',compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.settings.admins.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|unique:admins',
            'new_password' => 'required|same:confirm_password',
            'role' => 'required'
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['new_password']);
        
        $admin = Admin::create($input);

        $admin->assignRole($input['role']);

        return redirect()->route('admins.index');
    }

    public function edit(Admin $admin)
    {
        $adminRole = $admin->roles->pluck('name','name')->all();

        $roles = Role::all();
        
        return view('admin.settings.admins.edit', compact('admin','adminRole','roles'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'role' => 'required',
        ]);

        $admin->update($request->all());

        DB::table('model_has_roles')->where('model_id',$admin->id)->delete();

        $admin->assignRole($request->input('role'));

        return redirect()->route('admins.index')->with('success_message','Admin updated successfully.');
    }

    public function deleteAdmin(Admin $admin)
    {
        $file_path = "images/admin_images/admin_photos/";

        if(file_exists($file_path.$admin->image) && !empty($admin->image)) {
            unlink($file_path.$admin->image);
        }

        $admin->delete();

        session::flash('success_message', 'Admin deleted successufly.');

        return redirect()->back();
    }
}
