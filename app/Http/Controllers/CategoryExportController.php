<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CatagoryExport;

class CategoryExportController extends Controller
{

    public function index()
    {
        // download data into excel 
        return Excel::download(new CatagoryExport, 'service_category.xlsx');
    }
}
