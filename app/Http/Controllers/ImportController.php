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
        $failures = method_exists($import, 'failures') ? $import->failures() : [];
        
        // Catat notifikasi jika ada error sebagian
        if (!empty($import->failedRows)) {
            $limitedData = !empty($failedRows) ? array_slice($failedRows, 0, 10) : array_slice($failures, 0, 10);
            \App\Models\Notification::create([
                'type' => 'import_buku',
                'message' => 'Beberapa data buku gagal diimport.',
                'data' => $limitedData,
            ]);
        } else {
            // Catat notifikasi jika import sukses semua
            \App\Models\Notification::create([
                'type' => 'import_buku',
                'message' => 'Import buku berhasil tanpa error.',
                'data' => null,
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

        $import = new SupplierImport();
        Excel::import($import, $request->file('file'));

        $failures = method_exists($import, 'failures') ? $import->failures() : [];
        $failedRows = property_exists($import, 'failedRows') ? $import->failedRows : [];

        if (!empty($failures) || !empty($failedRows)) {
            // Batasi data yang dikirim ke tabel notifikasi, misal maksimal 10 baris
            $limitedData = !empty($failedRows) ? array_slice($failedRows, 0, 10) : array_slice($failures, 0, 10);

            \App\Models\Notification::create([
                'type' => 'import_supplier',
                'message' => 'Beberapa data supplier gagal diimport.',
                'data' => $limitedData,
            ]);
        } else {
            \App\Models\Notification::create([
                'type' => 'import_supplier',
                'message' => 'Import supplier berhasil tanpa error.',
                'data' => null,
            ]);
        }

        return back()->with([
            'success' => 'Import berhasil!',
            'failures' => $failures,
            'failedRows' => $failedRows,
        ]);
    }
}
