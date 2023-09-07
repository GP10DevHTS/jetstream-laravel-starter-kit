<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WaitingListsController extends Controller
{
    public function index(): View
    {
        return view('pages.test-results.waiting-lists.index');
    }
}
