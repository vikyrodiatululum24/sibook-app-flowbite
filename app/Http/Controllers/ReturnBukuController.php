<?php

namespace App\Http\Controllers;

use App\Models\ReturnBuku;
use App\Models\Buku;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReturnBukuController extends Controller
{
  public function index()
  {
    $returns = ReturnBuku::with(['buku', 'customer'])->get();
    return view('return.index', compact('returns'));
  }

  public function scan()
  {
    return view('return.scan');
  }

  public function result($result)
  {
        // dd($result);
        if (!$result) {
            return redirect()->back()->with('error', 'Hasil scan tidak ditemukan.');
        }
        $buku = Buku::where('part_no', $result)->first();
        // $customer = Customer::all();

        if (!$buku) {
            return redirect()->back()->with('error', 'Data buku tidak ditemukan.');
        }

        return view('return.result', compact('buku'));
  }

  public function create()
  {
    $bukus = Buku::all();
    $customers = Customer::all();
    return view('return.create', compact('bukus', 'customers'));
  }

  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'buku_id' => 'required|exists:bukus,id',
      'customer_id' => 'required|exists:customers,id',
      'jumlah' => 'required|integer',
      'keterangan' => 'nullable|string',
    ]);

    // Tambahkan data return
    ReturnBuku::create([
      'buku_id' => $request->buku_id,
      'customer_id' => $request->customer_id,
      'tanggal_return' => Carbon::now(),
      'jumlah' => $request->jumlah,
      'keterangan' => $request->keterangan,
    ]);

    // Tambahkan jumlah ke stok buku
    $buku = Buku::find($request->buku_id);
    if ($buku) {
      $buku->stock += $request->jumlah;
      $buku->save();
    }

    return redirect()->route('return.index')->with('success', 'Data return berhasil ditambahkan.');
  }

  public function show($id)
  {
    $return = ReturnBuku::with(['buku', 'customer'])->findOrFail($id);
    return view('return.show', compact('return'));
  }

  public function edit($id)
  {
    $return = ReturnBuku::findOrFail($id);
    $bukus = Buku::all();
    $customers = Customer::all();
    return view('return.edit', compact('return', 'bukus', 'customers'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'buku_id' => 'required|exists:bukus,id',
      'customer_id' => 'required|exists:customers,id',
      'tanggal_return' => 'required|date',
      'jumlah' => 'required|integer',
      'keterangan' => 'nullable|string',
    ]);
    $return = ReturnBuku::findOrFail($id);

    // Update stok buku jika jumlah atau buku_id berubah
    $oldJumlah = $return->jumlah;
    $oldBukuId = $return->buku_id;
    $newJumlah = $request->jumlah;
    $newBukuId = $request->buku_id;

    // Jika buku_id berubah, kembalikan stok lama dan tambahkan stok baru
    if ($oldBukuId != $newBukuId) {
      $oldBuku = Buku::find($oldBukuId);
      if ($oldBuku) {
        $oldBuku->stok -= $oldJumlah;
        $oldBuku->save();
      }
      $newBuku = Buku::find($newBukuId);
      if ($newBuku) {
        $newBuku->stok += $newJumlah;
        $newBuku->save();
      }
    } else {
      // Jika buku_id sama, update stok berdasarkan selisih jumlah
      $buku = Buku::find($newBukuId);
      if ($buku) {
        $buku->stock += ($newJumlah - $oldJumlah);
        $buku->save();
      }
    }

    $return->update($request->all());
    return redirect()->route('return.index')->with('success', 'Data return berhasil diupdate.');
  }

  public function destroy($id)
  {
    $return = ReturnBuku::findOrFail($id);
    $return->delete();
    return redirect()->route('return.index')->with('success', 'Data return berhasil dihapus.');
  }

  public function data(Request $request)
  {
    // Ambil data Masuk beserta relasi buku dan supplier
    $return = ReturnBuku::with(['buku', 'customer'])->get();
    if ($request->has('search') && $request->input('search.value') !== null) {
      $search = $request->input('search.value');
      if (!empty($search)) {
        $return->where(function ($query) use ($search) {
          $query->whereHas('buku', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('part_no', 'like', "%{$search}%")
              ->orWhere('penerbit', 'like', "%{$search}%");
          })->orWhereHas('customer', function ($q) use ($search) {
              $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            })
            ->orWhere('keterangan', 'like', "%{$search}%")
            ->orWhere('jumlah', 'like', "%{$search}%");
        });
      }
    }

    return datatables()
      ->of($return)
      ->addColumn('action', function ($return) {
        return view('return.partials.action', compact('return'))->render();
      })
      // ->editColumn('stock', function ($masuk) {
      //     return $masuk->buku->stock ?? 0;
      // })
      ->rawColumns(['action']) // wajib jika return HTML
      ->make(true);
  }
}
