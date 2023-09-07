<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GivePermissionsToRoleController extends Controller
{
    // view to assign permissions to a role
    public function create(): View
    {
        return view('pages.roles-permissions.give-permissions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // validatation
        Validator::make($request->all(), [
            'role_id' => 'required',
        ])
            ->validated();

        // Fetch the role id from the database.
        $role = Role::where('id', $request->role_id)->first();

        // add permissions to this role if it is present
        // else redirect back.
        if (!is_null($role)) {
            $role->syncPermissions($request->permissions);
            return to_route('roles.index');
        } else {
            return to_route('roles.give-permissions')
                ->with('error', 'Please select a role you are assigning permissions to.');
        }
    }

    public function edit(Role $role): View
    {
        // fetch models
        $roles = Role::all();
        $modules = Module::all();
        $permissions = Permission::get();

        // go to the role_permissions table and fetch all the 
        // permissions that belongs to this role to be
        // displayed.
        $role_permissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $role->id)
            ->pluck(
                'role_has_permissions.permission_id',
                'role_has_permissions.permission_id'
            )
            ->toArray();

        return view('pages.roles-permissions.give-permissions.edit', compact('role', 'modules', 'permissions', 'role_permissions'));
    }

    public function update(Role $role, Request $request): RedirectResponse
    {
        $role->syncPermissions($request->permissions);
        return to_route('roles.show', $role)->with('success', 'Permissions have been updated');
    }
}
