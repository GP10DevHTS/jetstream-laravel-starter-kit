<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeletedCategoriesController extends Controller
{
    // display index page
    public function index(): View
    {
        return view('pages.categories.deleted-categories.index');
    }
}
