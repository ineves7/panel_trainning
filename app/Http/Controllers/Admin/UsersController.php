<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Role as ModelsRole;

class UsersController extends Controller
{

    public function index()
    {
        if (! Gate::allows('Ver e Listar Usuários')) {
            return abort(401);
        }

        $users = User::all();

        return view('admin.usuarios.index', compact('users'));
    }

    public function create()
    {
        if (! Gate::allows('Criar Usuários')) {
            return abort(401);
        }

        $roles = ModelsRole::get()->pluck('name', 'name'); 

        return view('admin.usuarios.create', compact('roles'));
    }

    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('Criar Usuários')) {
            return abort(401);
        }

        $user = User::create([
            'name'=>request('name'),
            'email'=>request('email'),

             //hash your password

            'password'=>Hash::make(request('password'))
        ]);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('users.index');
    }

    public function edit(User $user) : View
    {
        if (! Gate::allows('Editar Usuários')) {
            return abort(401);
        }

        $roles = ModelsRole::get()->pluck('name', 'name');

        return view('admin.usuarios.edit', compact('user', 'roles'));
    }

    public function update(UpdateUsersRequest $request, User $user): RedirectResponse
    {
        if (! Gate::allows('Editar Usuários')) {
            abort(401);
        }
        $update = [
            'name'=>request('name'),
            'email'=>request('email'),
        ];
        if($request->get('password')){
            $update['password'] =Hash::make($request->get('password'));
        }
        $user->update($update);

        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        if (! Gate::allows('Ver e Listar Usuários')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        if (! Gate::allows('Deletar Usuários')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('users.index');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('Deletar Usuários')) {
            return abort(401);
        }

        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}