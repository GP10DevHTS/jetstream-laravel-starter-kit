<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(): View
    {
        // fetch all the roles
        $roles = Role::with('permissions')->get();
        return view('pages.roles-permissions.roles.index', compact('roles'));
    }

    public function create(): View
    {
        return view('pages.roles-permissions.roles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // create role
        Role::create([
            'name' => $request->name,
        ]);

        return to_route('roles.index')->with('success', 'Role has been added.');
    }

    public function show(Role $role): View
    {
        return view('pages.roles-permissions.roles.show', compact('role'));
    }
}
