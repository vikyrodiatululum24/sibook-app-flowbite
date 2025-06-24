<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opname;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class OpnameController extends Controller
{
    public function index(Request $request, $month = null)
    {
        // Default bulan: bulan ini
        $month = $month ?? now()->format('Y-m');
        $bulanSekarang = now()->format('Y-m');
        $bulanList = collect(range(0, 11))->map(function ($i) {
            return now()->subMonths($i)->format('Y-m');
        });

        $query = Opname::with('buku');
        if ($month) {
            $query->whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [$month]);
        }
        $opnames = $query->orderBy('tanggal_opname', 'desc')->paginate(10);
        return view('opname.index', compact('opnames', 'month', 'bulanList'));
    }

    public function scan()
    {
        return view('opname.scan');
    }

    public function result($result)
    {
        $buku = Buku::where('part_no', $result)->first();

        // Cek apakah buku sudah diopname pada periode (bulan) ini
        $periode = now()->format('Y-m');
        $opname = Opname::with('buku')
            ->whereHas('buku', function ($q) use ($result) {
            $q->where('part_no', $result);
            })
            ->whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [$periode])
            ->first();

        if ($opname) {
            // Jika sudah diopname, tampilkan data opname
            return view('opname.result', ['buku' => $opname->buku, 'opname' => $opname]);
        }

        // Jika belum diopname, cari data buku di tabel buku
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


        $bulan = date('n', strtotime($validated['tanggal_opname']));
        $tahun = date('Y', strtotime($validated['tanggal_opname']));
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
        $validated['periode_opname'] = $namaBulan[$bulan] . ' ' . $tahun;

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

    public function tambah(Request $request, $id) {
        $opname = Opname::findOrFail($id);
        $validated = $request->validate([
            'stock_opname' => 'required|integer|min:0',
        ]);

        // Tambahkan jumlah stock_opname sebelumnya dengan yang baru dimasukkan
        $opname->stock_opname += $validated['stock_opname'];

        // Hitung ulang selisih dan keterangan
        $opname->selisih = $opname->stock_opname - $opname->stock_system;
        if ($opname->selisih < 0) {
            $opname->keterangan = "Kurang";
        } elseif ($opname->selisih > 0) {
            $opname->keterangan = 'Lebih';
        } else {
            $opname->keterangan = 'Sesuai';
        }

        $opname->save();

        return redirect()->route('opname.index')->with('success', 'Jumlah opname berhasil ditambahkan.');
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
        // Ambil bulan dan tahun dari tanggal_opname dan set periode_opname (format: "Januari 2024")
        $bulan = date('n', strtotime($validated['tanggal_opname']));
        $tahun = date('Y', strtotime($validated['tanggal_opname']));
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
        $validated['periode_opname'] = $namaBulan[$bulan] . ' ' . $tahun;

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

    public function data(Request $request)
    {
        $query = Opname::with('buku');

        // Pastikan id tersedia untuk kolom action di datatables
        if ($request->has('month') && $request->month) {
            $query->whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [$request->month]);
        } else {
            $query->whereRaw("DATE_FORMAT(tanggal_opname, '%Y-%m') = ?", [now()->format('Y-m')]);
        }
        
        if ($request->has('search') && $request->input('search.value') !== null) {
            $search = $request->input('search.value');
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('buku', function ($qb) use ($search) {
                        $qb->where('name', 'like', "%{$search}%")
                            ->orWhere('part_no', 'like', "%{$search}%")
                            ->orWhere('penerbit', 'like', "%{$search}%");
                    })
                    ->orWhere('keterangan', 'like', "%{$search}%")
                    ->orWhere('tanggal_opname', 'like', "%{$search}%")
                    ->orWhere('stock_system', 'like', "%{$search}%")
                    ->orWhere('stock_opname', 'like', "%{$search}%")
                    ->orWhere('selisih', 'like', "%{$search}%");
                });
            }
        }
        // Untuk debugging, jika ingin melihat hasil query, gunakan:
        // dd($query->get());
        return datatables()
            ->of($query->get())
            ->addColumn('action', function ($query) {
                return view('opname.partials.action', compact('query'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
