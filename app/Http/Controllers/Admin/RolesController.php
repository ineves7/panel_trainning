<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use App\Models\Role as ModelsRole;
use App\Models\Permission as ModelsPermission;
use App\Models\User;

class RolesController extends Controller
{
    /**
     * Display a listing of ModelsRole.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('Ver e Listar Regras')) {
            return abort(401);
        }

        $pageConfigs = ['pageHeader' => false,];

        $roles = ModelsRole::with('users')->get();
        $users = User::with('roles')->get();

        return view('/admin/rolesPermission/access-roles', ['pageConfigs' => $pageConfigs], compact('roles', 'users'));
    }

    /**
     * Show the form for creating new ModelsRole.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('Criar Regras')) {
            return abort(401);
        }

        $pageConfigs = ['pageHeader' => false,];

        $roles = ModelsRole::with('users')->get();

        $permissions = ModelsPermission::all();

        return view('/admin/rolesPermission/access-roles-create', ['pageConfigs' => $pageConfigs], compact('roles', 'permissions'));
    }

    /**
     * Store a newly created ModelsRole in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        if (! Gate::allows('Criar Regras')) {
            return abort(401);
        }

        $pageConfigs = ['pageHeader' => false,];

        $role = ModelsRole::create($request->except('permissions'));

        foreach($request['permissions'] as $permission){
            $role->givePermissionTo($permission);
        }

        $roles = ModelsRole::with('users')->get();

        $permissions = ModelsPermission::all();

        return view('/admin/rolesPermission/access-roles-create', ['pageConfigs' => $pageConfigs], compact('roles', 'permissions'));
    }


    /**
     * Show the form for editing ModelsRole.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsRole $role)
    {
        if (! Gate::allows('Editar Regras')) {
            return abort(401);
        }
        
        $pageConfigs = ['pageHeader' => false,];

        $permissions = ModelsPermission::get()->pluck('name', 'id');

        return view('/admin/rolesPermission/access-roles-edit', ['pageConfigs' => $pageConfigs], compact('role', 'permissions'));
    }

    /**
     * Update ModelsRole in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, ModelsRole $role)
    {
        if (! Gate::allows('Editar Regras')) {
            return abort(401);
        }

        $role->update($request->except('permissions'));

        foreach($request['permissions'] as $permission){
            $role->givePermissionTo($permission);
        }

        return redirect()->route('roles.index');
    }

    public function show(ModelsRole $role)
    {
        if (! Gate::allows('Ver e Listar Regras')) {
            return abort(401);
        }

        $role->load('permissions');

        return view('admin.regras.show', compact('role'));
    }


    /**
     * Remove ModelsRole from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsRole $role)
    {
        if (! Gate::allows('Deletar Regras')) {
            return abort(401);
        }

        $role->delete();

        $pageConfigs = ['pageHeader' => false,];

        $roles = ModelsRole::with('users')->get();
        $users = User::with('roles')->get();

        return view('/admin/rolesPermission/access-roles', ['pageConfigs' => $pageConfigs], compact('roles', 'users'));
    }

    /**
     * Delete all selected ModelsRole at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        ModelsRole::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}