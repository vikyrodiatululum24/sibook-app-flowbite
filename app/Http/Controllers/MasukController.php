<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masuk;
use App\Models\Buku;
use App\Models\Supplier;

class MasukController extends Controller
{
    public function index()
    {
        $masuks = Masuk::with(['buku', 'supplier'])->get();
        // dd($masuks);
        return view('masuk.index', compact('masuks'));
    }

    public function scan()
    {
        return view('masuk.scan');
    }

    public function result($result)
    {
        // dd($result);
        if (!$result) {
            return redirect()->back()->with('error', 'Hasil scan tidak ditemukan.');
        }
        $buku = Buku::where('part_no', $result)->first();
        $suppliers = Supplier::find($buku->supplier_id ?? null);

        if (!$buku) {
            return redirect()->back()->with('error', 'Data buku tidak ditemukan.');
        }

        return view('masuk.result', compact('buku', 'suppliers'));
    }

    public function create()
    {
        $bukus = Buku::all();
        $suppliers = Supplier::all();
        return view('masuk.create', compact('bukus', 'suppliers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ], [
            'buku_id.required' => 'Buku harus dipilih.',
            'supplier_id.required' => 'Supplier harus dipilih.',
            'jumlah.required' => 'Jumlah buku masuk harus diisi.',
            'jumlah.integer' => 'Jumlah buku masuk harus berupa angka.',
            'jumlah.min' => 'Jumlah buku masuk minimal 1.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.'
        ]);


        Masuk::create([
            'buku_id' => $request->buku_id,
            'supplier_id' => $request->supplier_id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => now(),
            'keterangan' => $request->keterangan
        ]);

        $buku = Buku::find($request->buku_id);
        if ($buku) {
            $buku->stock += $request->jumlah;
            $buku->save();
        }
        return redirect()->route('masuk.index')->with('success', 'Data buku masuk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $masuk = Masuk::with(['buku', 'supplier'])->findOrFail($id);
        return view('masuk.show', compact('masuk'));
    }

    public function edit($id)
    {
        $masuk = Masuk::findOrFail($id);
        $bukus = Buku::all();
        $suppliers = Supplier::all();
        return view('masuk.edit', compact('masuk', 'bukus', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $masuk = Masuk::findOrFail($id);

        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ], [
            'buku_id.required' => 'Buku harus dipilih.',
            'supplier_id.required' => 'Supplier harus dipilih.',
            'jumlah.required' => 'Jumlah buku masuk harus diisi.',
            'jumlah.integer' => 'Jumlah buku masuk harus berupa angka.',
            'jumlah.min' => 'Jumlah buku masuk minimal 1.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter.'
        ]);

        // Ambil jumlah lama dan buku lama
        $oldJumlah = $masuk->jumlah;
        $oldBukuId = $masuk->buku_id;

        // Update data masuk
        $masuk->update([
            'buku_id' => $request->buku_id,
            'supplier_id' => $request->supplier_id,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        // Update stok buku lama jika buku diganti
        if ($oldBukuId != $request->buku_id) {
            // Kurangi stok buku lama
            $oldBuku = Buku::find($oldBukuId);
            if ($oldBuku) {
                $oldBuku->stock -= $oldJumlah;
                $oldBuku->save();
            }
            // Tambah stok buku baru
            $newBuku = Buku::find($request->buku_id);
            if ($newBuku) {
                $newBuku->stock += $request->jumlah;
                $newBuku->save();
            }
        } else {
            // Jika buku tidak diganti, update stok sesuai perubahan jumlah
            $buku = Buku::find($request->buku_id);
            if ($buku) {
                $buku->stock = $buku->stock - $oldJumlah + $request->jumlah;
                $buku->save();
            }
        }
        return redirect()->route('masuk.index')->with('success', 'Data buku masuk berhasil diupdate.');
    }

    public function destroy($id)
    {
        $masuk = Masuk::findOrFail($id);
        $masuk->delete();
        return redirect()->route('masuk.index')->with('success', 'Data buku masuk berhasil dihapus.');
    }
}
