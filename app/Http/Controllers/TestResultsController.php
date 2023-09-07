<?php

namespace App\Http\Controllers;

use App\Models\TestResult;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestResultsController extends Controller
{
    // view a list of patients
    public function index(): View
    {
        // restrict access
        $this->authorize('view test result module');
        return view('pages.test-results.index');
    }

    public function show(TestResult $test_result): View
    {
        return view('pages.test-results.show', compact('test_result'));
    }
}
