<?php

namespace App\Http\Controllers;

use App\Models\ReturnBuku;
use App\Models\Buku;
use App\Models\Customer;
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

  public function result(Request $request)
  {
    $request->validate([
      'buku_id' => 'required|exists:bukus,id',
    ]);

    $return = Buku::where('id', $request->buku_id)->first();

    if ($return) {
      return redirect()->route('return.show', $return->id);
    } else {
      return redirect()->back()->with(['error' => 'Data return tidak ditemukan.']);
    }
  }

  public function create()
  {
    $bukus = Buku::all();
    $customers = Customer::all();
    return view('return.create', compact('bukus', 'customers'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'buku_id' => 'required|exists:bukus,id',
      'customer_id' => 'required|exists:customers,id',
      'tanggal_return' => 'required|date',
      'jumlah' => 'required|integer',
      'keterangan' => 'nullable|string',
    ]);

    // Tambahkan data return
    ReturnBuku::create($request->all());

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
}
