<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opname;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class OpnameController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter tanggal dari request jika ada, jika tidak ambil semua
        $tanggal = $request->input('tanggal_opname');

        $query = \App\Models\Opname::with('buku');

        if ($tanggal) {
            $query->whereDate('tanggal_opname', $tanggal);
        }

        $opnames = $query->orderBy('tanggal_opname', 'desc')->paginate(10);

        return view('opname.index', compact('opnames', 'tanggal'));
    }

    public function scan()
    {
        return view('opname.scan');
    }

    public function result($result)
    {
        $buku = Buku::where('part_no', $result)->first();

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan: ' . $result);
        }

        return view('opname.result', compact('buku'));
    }

    public function create()
    {
        $bukus = Buku::all();
        return view('opname.create', compact('bukus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'stock_system' => 'required|integer',
            'stock_opname' => 'required|integer',
            'tanggal_opname' => 'required|date',
        ], [
            'buku_id.required' => 'Buku harus dipilih.',
            'stock_system.required' => 'Stok sistem harus diisi.',
            'stock_opname.required' => 'Stok opname harus diisi.',
            'tanggal_opname.required' => 'Tanggal opname harus diisi.',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['selisih'] = $validated['stock_opname'] - $validated['stock_system'];
        if ($validated['selisih'] < 0) {
            $validated['keterangan'] = "Kurang";
        } elseif ($validated['selisih'] > 0) {
            $validated['keterangan'] = 'Lebih';
        } else {

            $validated['keterangan'] = 'Sesuai';
        }
                // Ambil bulan dari tanggal_opname dan set periode_opname sesuai nama bulan
        $bulan = date('n', strtotime($validated['tanggal_opname']));
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $validated['periode_opname'] = $namaBulan[$bulan];

        Opname::create($validated);

        return redirect()->route('opname.index')->with('success', 'Data opname berhasil ditambahkan.');
    }

    public function show($id)
    {
        $opname = \App\Models\Opname::with('buku')->findOrFail($id);
        return view('opname.show', compact('opname'));
    }

    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $bukus = Buku::all();
        return view('opname.edit', compact('opname', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $opname = Opname::findOrFail($id);

        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'stock_system' => 'required|integer',
            'stock_opname' => 'required|integer',
            'tanggal_opname' => 'required|date',
        ]);

        $validated['selisih'] = $validated['stock_opname'] - $validated['stock_system'];
        if ($validated['selisih'] < 0) {
            $validated['keterangan'] = "Kurang";
        } elseif ($validated['selisih'] > 0) {
            $validated['keterangan'] = 'Lebih';
        } else {
            $validated['keterangan'] = 'Sesuai';
        }

        // Ambil bulan dari tanggal_opname dan set periode_opname sesuai nama bulan
        $bulan = date('n', strtotime($validated['tanggal_opname']));
        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $validated['periode_opname'] = $namaBulan[$bulan];
        dd($validated);

        $opname->update($validated);

        return redirect()->route('opname.index')->with('success', 'Data opname berhasil diupdate.');
    }

    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();
        return redirect()->route('opname.index')->with('success', 'Data opname berhasil dihapus.');
    }

    public function filterByPeriode(Request $request)
    {
        // Contoh: filter berdasarkan rentang tanggal
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $query = \App\Models\Opname::with('buku');

        if ($start && $end) {
            $query->whereBetween('tanggal_opname', [$start, $end]);
        }

        $opnames = $query->orderBy('tanggal_opname', 'desc')->paginate(10);

        return view('opname.index', compact('opnames', 'start', 'end'));
    }
}
