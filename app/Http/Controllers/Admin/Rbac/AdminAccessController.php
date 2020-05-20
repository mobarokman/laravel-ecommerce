<?php

namespace App\Http\Controllers\Admin\Rbac;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rbac.admin_access.manage');

    }
    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\Response
     */
    public function adminWithRole()
    {
        $admins = Admin::with('roles')->get();
        return view('admin.rbac.admin_access.admin_with_role', compact('admins'));
    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\Response
     */
    public function giveRoleToUser()
    {
        $users = Admin::get();
        $roles = Role::get();

        return view('admin.rbac.admin_access.give_role', compact('users', 'roles'));
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postGiveRoleToUser(Request $request)
    {
        $user_id = $request->user;
        $role = $request->role;
        $user = Admin::find($user_id);
        $user->assignRole($role);
        return response()->json([
            "code" => 200,
            "msg" => "Role given successfully.",
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
