<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Masuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ScannerController extends Controller
{
    public function scan()
    {
        // Mengembalikan view untuk scanning
        return view('scanner.scan');
    }
    
    public function result($result)
    {
        $buku = Buku::where('part_no', $result)->first();
        $suppliers = Supplier::all();

        if (!$buku) {
            // Jika buku kosong, kembalikan logic error
            return redirect()->back()->with('error', 'Buku tidak ditemukan: ' . $result);
        }

        return view('book.result', compact('buku', 'suppliers'));
    }

    public function global($result)
    {
        $buku = Buku::where('part_no', $result)->first();
        $suppliers = Supplier::all();

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan: ' . $result);
        }

        return view('book.result', compact('buku', 'suppliers'));
    }
}
