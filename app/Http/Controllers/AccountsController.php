<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    // View index page
    public function index(): View
    {
        return view('pages.accountings.index');
    }

    public function show(Patient $patient): View
    {
        return view('pages.accountings.show', compact('patient'));
    }

    public function printReceipt(Patient $patient): View
    {
        $payment = Payment::where('patient_id', $patient->id)->latest()->limit(1)->first();
        return view('pages.accountings.print-receipt', compact('patient', 'payment'));
    }
}
