<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index(): View
    {
        $modules = Module::all();
        return view('pages.roles-permissions.permissions.index', compact('modules'));
    }
}
