<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LabServicesController extends Controller
{
    // display index page
    public function index(): View
    {
        // restrict index page
        $this->authorize('view test service module');
        return view('pages.lab-services.index');
    }
}
