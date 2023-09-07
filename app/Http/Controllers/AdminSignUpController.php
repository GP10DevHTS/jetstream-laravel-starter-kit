<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminSignUpController extends Controller
{
    use PasswordValidationRules;

    // page for displaying form
    public function create(): View
    {
        return view('pages.auth.signup.create');
    }

    // store registration data to database
    public function store(Request $request): RedirectResponse
    {
        // validate data
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])
            ->validated();

        // fetch user roles
        $role = Role::where('id', 1)->first();

        // create user
        $user = User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // assign role
        $user->assignRole($role->id);
        // redirect to login
        return to_route('login');
    }
}
