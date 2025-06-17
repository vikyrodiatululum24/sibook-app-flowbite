<?php

namespace App\Http\Controllers;

use App\Imports\BukuImport;
use Illuminate\Http\Request;
use App\Imports\SupplierImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importBuku(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $import = new BukuImport();
        Excel::import($import, $request->file('file'));

        // Catat notifikasi jika ada error
        if (!empty($import->failedRows)) {
            \App\Models\Notification::create([
                'type' => 'import_buku',
                'message' => 'Beberapa data buku gagal diimport.',
                'data' => $import->failedRows,
            ]);
        }

        return back()->with([
            'success' => 'Import berhasil!',
            'failures' => $import->failures(),
            'failedRows' => $import->failedRows,
        ]);
    }

    public function importSupplier(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Implementasi import untuk Supplier
        // Misalnya, menggunakan SupplierImport yang belum dibuat
        $supplier = new SupplierImport();
        Excel::import($supplier, $request->file('file'));

        // Catat notifikasi jika ada error
        // if (!empty($supplier->failedRows)) {
        //     \App\Models\Notification::create([
        //         'type' => 'import_supplier',
        //         'message' => 'Beberapa data supplier gagal diimport.',
        //         'data' => $supplier->failedRows,
        //     ]);
        // }

        return back()->with([
            'success' => 'Import berhasil!',
            'failures' => $supplier->failures(),
            // 'failedRows' => $supplier->failedRows,
        ]);

        return back()->with('success', 'Import supplier berhasil!');
    }
}
