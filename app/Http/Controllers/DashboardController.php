<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Masuk;
use App\Models\Keluar;
use App\Models\Opname;

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

        return view('dashboard', compact(
            'bukuCount',
            'supplierCount',
            'customerCount',
            'masukCount',
            'keluarCount',
            'opnameCount'
        ));
    }
}
