<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Supplier;
use App\Models\Customer;

class MasterDataController extends Controller
{
  public function buku(Request $request)
  {
    $query = $request->input('q');
    $bukus = Buku::query();
    if ($query) {
      $bukus->where('name', 'like', "%$query%");
    }
    return response()->json($bukus->select('id', 'name')->limit(20)->get());
  }

  public function supplier(Request $request)
  {
    $query = $request->input('q');
    $suppliers = Supplier::query();
    if ($query) {
      $suppliers->where('name', 'like', "%$query%");
    }
    return response()->json($suppliers->select('id', 'name')->limit(20)->get());
  }

  public function customer(Request $request)
  {
    $query = $request->input('q');
    $customers = Customer::query();
    if ($query) {
      $customers->where('name', 'like', "%$query%");
    }
    return response()->json($customers->select('id', 'name')->limit(20)->get());
  }
}
