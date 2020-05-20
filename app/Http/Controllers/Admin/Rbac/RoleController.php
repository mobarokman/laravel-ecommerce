<?php

namespace App\Http\Controllers\Admin\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.rbac.roles.index');
    }

    public function roleList()
    {
        $roles = Role::with('permissions')->get();

        return view('admin.rbac.roles.role_list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rbac.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->role,
            'guard_name' => 'admin',
        ]);
        auth('admin')->user()->assignRole($role);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAssignOrRemovePermission($role_id)
    {
        $role = Role::find($role_id);
        $assignedPermission = Role::find($role_id)->permissions;
        $permissions = Permission::all();

        return view('admin.rbac.roles.assign_permission', compact('role', 'permissions', 'assignedPermission'));

    }

    public function postAssignOrRemovePermission(Request $request, $role_id)
    {
        $role = Role::find($role_id);

        if ($request->has('revoke_per')) {
            foreach ($request->revoke_per as $key => $value) {
                $role->revokePermissionTo($value);
            }
        }
        if ($request->has('permissions')) {
            foreach ($request->permissions as $key => $value) {
                $role->givePermissionTo($value);
            }
        }
        
        return redirect()->back();

    }
}
