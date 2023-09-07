<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServiceCategoriesController extends Controller
{
    // display a list of categories in the database
    public function index(): View
    {
        $this->authorize('view category module');
        return view('pages.categories.index');
    }
}
