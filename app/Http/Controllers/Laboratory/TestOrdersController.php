<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestOrdersController extends Controller
{
    public function index(): View
    {
        return view('pages.laboratory.test-orders.index');
    }
}
