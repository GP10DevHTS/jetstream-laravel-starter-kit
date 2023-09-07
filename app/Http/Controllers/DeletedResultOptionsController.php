<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeletedResultOptionsController extends Controller
{
    // display index page
    public function index(): View
    {
        return view('deleted-resources.result-options');
    }
}
