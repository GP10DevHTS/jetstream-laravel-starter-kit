<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignRolesController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('pages.roles-permissions.assign-roles.index', compact('users'));
    }

    public function create(): View
    {
        $users = User::all();
        $roles = Role::all();

        return view('pages.roles-permissions.assign-roles.create', compact('users', 'roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::where('id', $request->user_id)->first();
        $user->assignRole($request->role_id);
        return to_route('assign-roles.index')->with('success', 'A user has been assigned a role.');
    }

    public function show(User $user): View
    {
        return view('pages.roles-permissions.assign-roles.show', compact('user'));
    }

    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('pages.roles-permissions.assign-roles.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->role_id);

        return to_route('assing-roles.show', $user)->with('success', 'Role has been updated');
    }
}
