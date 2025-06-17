<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluar;
use App\Models\Buku;
use App\Models\Customer;

class KeluarController extends Controller
{
    public function index()
    {
        $keluars = Keluar::with(['buku', 'customer'])->get();
        return view('keluar.index', compact('keluars'));
    }

    public function scan()
    {
        return view('keluar.scan');
    }

    public function result($result)
    {
        $buku = Buku::where('part_no', $result)->first();
        $customers = Customer::all();

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan: ' . $result);
        }

        return view('keluar.result', compact('buku', 'customers'));
    }


    public function create()
    {
        $bukus = Buku::all();
        $customers = Customer::all();
        return view('keluar.create', compact('bukus', 'customers'));
    }

    public function store(Request $request)
    {
        // $request->merge([
        //     'jumlah' => (int) $request->input('jumlah'),
        // ]);
        // // dd(request('jumlah'));
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'customer_id' => 'required|exists:customers,id',
            'jumlah' => 'required|integer|min:1',
            'status_keluar' => 'required|in:terjual, sample, lainnya',
        ], [
            'buku_id.required' => 'Buku harus dipilih.',
            'customer_id.required' => 'Customer harus dipilih.',
            'jumlah.required' => 'Jumlah buku keluar harus diisi.',
            'jumlah.integer' => 'Jumlah buku keluar harus berupa angka.',
            'jumlah.min' => 'Jumlah buku keluar minimal 1.',
            'status.required' => 'Status harus diisi.',
        ]);

        $buku = Buku::findOrFail($validated['buku_id']);
        if ($buku->stock < $validated['jumlah']) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok buku tidak mencukupi.']);
        }

        // Kurangi stok buku
        $buku->stock -= $validated['jumlah'];
        $buku->save();

        Keluar::create($validated + [
            'buku_id' => $buku->id,
            'customer_id' => $validated['customer_id'],
            'jumlah' => $validated['jumlah'],
            'keterangan' => $request->get('keterangan', ''),
            'status' => $validated['status_keluar'],
            'tanggal_keluar' => $request->get('tanggal_keluar', now()),
        ]);

        return redirect()->route('keluar.index')->with('success', 'Data keluar berhasil disimpan.');
    }

    public function show($id)
    {
        $keluar = Keluar::with(['buku', 'customer'])->findOrFail($id);
        return view('keluar.show', compact('keluar'));
    }

    public function edit($id)
    {
        $keluar = Keluar::with(['buku', 'customer'])->findOrFail($id);
        $bukus = Buku::all();
        $customers = Customer::all();
        return view('keluar.edit', compact('keluar', 'bukus', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $keluar = Keluar::findOrFail($id);

        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'customer_id' => 'required|exists:customers,id',
            'jumlah' => 'required|integer|min:1',
            'status_keluar' => 'required|in:terjual, sample, lainnya',
        ], [
            'buku_id.required' => 'Buku harus dipilih.',
            'customer_id.required' => 'Customer harus dipilih.',
            'jumlah.required' => 'Jumlah buku keluar harus diisi.',
            'jumlah.integer' => 'Jumlah buku keluar harus berupa angka.',
            'jumlah.min' => 'Jumlah buku keluar minimal 1.',
            'status.required' => 'Status harus diisi.',
        ]);

        $buku = Buku::findOrFail($validated['buku_id']);

        // Hitung selisih jumlah
        $selisih = $validated['jumlah'] - $keluar->jumlah;

        // Jika jumlah bertambah, cek stok
        if ($selisih > 0 && $buku->stock < $selisih) {
            return redirect()->back()->withErrors(['jumlah' => 'Stok buku tidak mencukupi untuk perubahan jumlah.']);
        }

        // Update stok buku
        $buku->stock -= $selisih;
        $buku->save();

        $keluar->update([
            'buku_id' => $buku->id,
            'customer_id' => $validated['customer_id'],
            'jumlah' => $validated['jumlah'],
            'keterangan' => $request->get('keterangan', ''),
            'status' => $validated['status_keluar'],
            'tanggal_keluar' => $request->get('tanggal_keluar', $keluar->tanggal_keluar),
        ]);

        return redirect()->route('keluar.index')->with('success', 'Data keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $keluar = Keluar::findOrFail($id);
        $keluar->delete();
        return redirect()->route('keluar.index');
    }
}
