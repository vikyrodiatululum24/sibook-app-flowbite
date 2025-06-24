<?php

namespace App\Http\Controllers;

use App\Exports\ReportOpname;
use App\Exports\SampleBuku;
use Illuminate\Http\Request;
use App\Exports\SampleBukuExport;
use App\Exports\SampleSupplier;
use App\Models\Opname;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function download()
    {

        return Excel::download(new SampleBukuExport, 'sample_format_excel.xlsx');
    }

    public function viewReport(Request $request)
    {
        $periode = $request->input('month', now()->format('Y-m'));
        $reports = Opname::whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [$periode])
            ->with('buku')
            ->orderBy('tanggal_opname', 'desc')
            ->get();
        if ($reports->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data untuk periode ini.');
        }
        $totalJumlahSistem = $reports->sum('stock_system');
        $totalJumlahOpname = $reports->sum('stock_opname');
        $totalSelisih = $reports->sum('selisih');

        return view('opname.report', compact('reports', 'totalJumlahSistem', 'totalJumlahOpname', 'totalSelisih'));
    }

    public function reportExcel(Request $request)
    {
        $periode = $request->input('month', now()->format('Y-m'));
        $reports = Opname::whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [$periode])
            ->with('buku')
            ->orderBy('tanggal_opname', 'desc')
            ->get();

        if ($reports->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data untuk periode ini.');
        }

        return Excel::download(new ReportOpname($reports, $periode), 'opname_report_' . $periode . '.xlsx');
    }



    public function downloadSupplier()
    {
        return Excel::download(new SampleSupplier, 'SampleSupplierImport.xlsx');
    }
    public function downloadbuku()
    {

        return Excel::download(new SampleBukuExport, 'SampleBukuImport.xlsx');
    }
    public function reportPdf(Request $request)
    {
        $periode = $request->input('month', now()->format('Y-m'));
        $reports = Opname::whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [$periode])
            ->with('buku')
            ->orderBy('tanggal_opname', 'desc')
            ->get();

        if ($reports->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data untuk periode ini.');
        }

        $totalJumlahSistem = $reports->sum('stock_system');
        $totalJumlahOpname = $reports->sum('stock_opname');
        $totalSelisih = $reports->sum('selisih');

        $pdf = Pdf::loadView('opname.report_pdf', compact('reports', 'totalJumlahSistem', 'totalJumlahOpname', 'totalSelisih', 'periode'));
        return $pdf->download('opname_report_' . $periode . '.pdf');
    }
}
