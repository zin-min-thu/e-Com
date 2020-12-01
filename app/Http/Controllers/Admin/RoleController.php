<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        return view('admin.settings.roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        $permissions = Permission::get();

        $permissions = $permissions->groupBy('guard_name');

        return view('admin.settings.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success_message', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $permissions = $permissions->groupBy('guard_name');

        $rolePermission = $role->permissions->pluck('name','name')->toArray();

        return view('admin.settings.roles.edit',compact('role','permissions','rolePermission'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role->update(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success_message','Role updated successfully.');
    }

    public function deleteRole(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success_message', 'Role deleted successfully.');
    }
}
