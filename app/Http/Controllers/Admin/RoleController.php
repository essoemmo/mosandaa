<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseAdminController
{
    public function __construct()
    {
        $this->permissionsAdmin('roles',$read = true, $create = true, $update = true, $delete = true);
    }

    public function index(RoleDataTable $roles)
    {
    $models = ['admins','roles','sections','categories','rates','request_jobs','request_service','ads','branches','consults','cons_details','settings','contactus'];

        $actions = ['create', 'read', 'update', 'delete'];

        return $roles->render('admin.roles.index',compact('models','actions'));
    }

    public function store(StoreRole $request)
    {
        $role = Role::create($request->only('name'));

        $role->attachPermissions($request->permissions);

        session()->flash('success', __('admin.addsuccessfully'));
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $models = ['admins','roles','sections','categories','rates','request_jobs','request_service','ads','branches','consults','cons_details','settings','contactus'];

        $actions = ['create', 'read', 'update', 'delete'];

        $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact('role','models','actions'));
    }

    public function update(UpdateRole $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update($request->only('name'));

        $role->syncPermissions($request->permissions);

        session()->flash('success', __('admin.updatesuccessfully'));
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::whereId($id)->delete();
        return response()->json(['status'=>'success']);
    }
}
