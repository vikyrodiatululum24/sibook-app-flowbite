<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Masuk;
use App\Models\Keluar;
use App\Models\Opname;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $bukuCount = Buku::count();
        $supplierCount = Supplier::count();
        $customerCount = Customer::count();
        $masukCount = Masuk::count();
        $keluarCount = Keluar::count();
        $opnameCount = Opname::count();

        // Tambahan:
        $stokKosongCount = Buku::where('stock', '<=', 0)->count();

        // Ambil bulan berjalan
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Jumlah buku masuk bulan ini
        $masukPerBulan = Masuk::whereMonth('tanggal_masuk', $currentMonth)
            ->whereYear('tanggal_masuk', $currentYear)
            ->sum('jumlah');

        // Jumlah buku keluar bulan ini
        $keluarPerBulan = Keluar::whereMonth('tanggal_keluar', $currentMonth)
            ->whereYear('tanggal_keluar', $currentYear)
            ->sum('jumlah');

        $keluarPerHari = Keluar::select(
            DB::raw('DATE(tanggal_keluar) as tanggal'),
            DB::raw('SUM(jumlah) as total')
        )
            ->whereMonth('tanggal_keluar', $currentMonth)
            ->whereYear('tanggal_keluar', $currentYear)
            ->groupBy(DB::raw('DATE(tanggal_keluar)'))
            ->orderBy('tanggal', 'ASC')
            ->get();

        // Pisahkan label dan data
        $keluarPerHariLabels = $keluarPerHari->pluck('tanggal')->map(function ($tanggal) {
            return Carbon::parse($tanggal)->format('d M'); // misal: 01 Jun
        });
        $keluarPerHariData = $keluarPerHari->pluck('total');

        return view('dashboard', compact(
            'bukuCount',
            'supplierCount',
            'customerCount',
            'masukCount',
            'keluarCount',
            'opnameCount',
            'stokKosongCount',
            'masukPerBulan',
            'keluarPerBulan',
            'keluarPerHariLabels',
            'keluarPerHariData'
        ));
    }
}
