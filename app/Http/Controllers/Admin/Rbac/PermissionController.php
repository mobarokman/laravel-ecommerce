<?php

namespace App\Http\Controllers\Admin\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

        return view('admin.rbac.permissions.index');
    }

    public function permissionList()
    {
        $permissions = Permission::with('roles')->get();

        return view('admin.rbac.permissions.permissions_list', compact('permissions'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.rbac.permissions.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->permission,
            'guard_name' => 'admin',
            ]);

        // //  now here we got the array of roles so assign permission to all roles in loop
        // foreach ($request->roles as $value) {
        //    $role = Role::find($value); //Here $value is a roles id

        //     // so now here assign a role
        //     $permission->assignRole($role);
        // }
      // $permission->syncRoles($request->roles);

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
        $permission = Permission::find($id);

        $roles = Role::all();

        return view('admin.rbac.permissions.edit', compact('permission','roles'));
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
        $permission = Permission::find($id);
        $permission->name = $request->permission;
        $permission->save();

        if($request->remove_permission === 'on') {
            $permission->syncRoles([]);
        } else {
            $permission->syncRoles($request->roles);
        }

        return redirect()->back();
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
}
