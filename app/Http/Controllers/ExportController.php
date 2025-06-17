<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SampleBukuExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function download()
    {
        return Excel::download(new SampleBukuExport, 'sample_format_excel.xlsx');
    }
}
