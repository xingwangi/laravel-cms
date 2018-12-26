<?php

namespace Modules\Admin\Http\Controllers;

use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin::role.index', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        Role::create(['name' => $request->name, 'title' => $request->title]);
        session()->flash('success', '添加成功');
        return back();
    }


    /**
     * Show the specified resource.
     * @return Response
     */


    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->except(['_token', '_method']);
        $role->update($data);
        session()->flash('success', '编辑成功');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }



    public function permission(Role $role)
    {
//        dd(\HDModule::getPermissionByGuard('admin'));die;
        $modules = \HDModule::getPermissionByGuard('admin');
        return view('admin::role.permission', compact('role', 'modules'));
    }

    public function permissionStore(Request $request,Role $role)
    {
        $role->syncPermissions($request->name);
        session()->flash('success', '权限分配成功');
        return back();
    }
}
