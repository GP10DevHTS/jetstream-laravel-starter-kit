<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ResultOptionsController extends Controller
{
    public function index(): View
    {
        $this->authorize('view outcome module');
        return view('pages.result-options.index');
    }
}
