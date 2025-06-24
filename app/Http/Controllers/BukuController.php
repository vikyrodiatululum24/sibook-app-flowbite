<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // Tampilkan daftar buku
    public function index()
    {
        return view('book.index');
    }

    public function scanner()
    {
        return view('book.scanner');
    }

    // Tampilkan detail buku
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('book.show', compact('buku'));
    }

    // Form input buku baru
    public function create()
    {
        return view('book.create');
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'inv_id' => 'required',
            'part_no' => 'nullable',
            'name' => 'required',
            'desc' => 'nullable',
            'segment_name' => 'nullable',
            'class' => 'nullable|integer',
            'kat09a' => 'nullable',
            'group_name' => 'nullable',
            'penerbit' => 'required',
            'isbn' => 'nullable',
            'bid_studi1' => 'nullable',
            'bid_studi2' => 'nullable',
            'th_terbit' => 'nullable|integer',
            'author' => 'nullable',
            'curriculum' => 'nullable',
            'stock' => 'nullable|integer',
            'harga' => 'nullable|numeric',
        ]);

        Buku::create($request->only([
            'inv_id',
            'part_no',
            'name',
            'desc',
            'segment_name',
            'class',
            'kat09a',
            'group_name',
            'penerbit',
            'isbn',
            'bid_studi1',
            'bid_studi2',
            'th_terbit',
            'author',
            'curriculum',
            'stock',
            'harga'
        ]));
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('book.edit', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'inv_id' => 'required',
            'part_no' => 'nullable',
            'name' => 'required',
            'desc' => 'nullable',
            'segment_name' => 'nullable',
            'class' => 'nullable|integer',
            'kat09a' => 'nullable',
            'group_name' => 'nullable',
            'penerbit' => 'required',
            'isbn' => 'nullable',
            'bid_studi1' => 'nullable',
            'bid_studi2' => 'nullable',
            'th_terbit' => 'nullable|integer',
            'author' => 'nullable',
            'curriculum' => 'nullable',
            'stock' => 'nullable|integer',
            'harga' => 'nullable|numeric',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->only([
            'inv_id',
            'part_no',
            'name',
            'desc',
            'segment_name',
            'class',
            'kat09a',
            'group_name',
            'penerbit',
            'isbn',
            'bid_studi1',
            'bid_studi2',
            'th_terbit',
            'author',
            'curriculum',
            'stock',
            'harga'
        ]));
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
    }

    // Hapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

    public function getSupplierByBuku($id)
    {
        $buku = \App\Models\Buku::with('supplier')->find($id);
        if (!$buku || !$buku->supplier) {
            return response()->json(['id' => '', 'name' => ''], 404);
        }
        return response()->json([
            'id' => $buku->supplier->id,
            'name' => $buku->supplier->name,
        ]);
    }
    public function getStokByBuku($id)
    {
        $buku = Buku::where('id', $id)->select('stock')->first();
        if (!$buku) {
            return response()->json(['stock' => 0], 404);
        }
        return response()->json([
            'stock' => $buku->stock,
        ]);
    }

    public function data(Request $request)
    {
        $bukus = Buku::query();
        if ($request->has('search') && $request->input('search.value') !== null) {
            $search = $request->input('search.value');
            if (!empty($search)) {
                $bukus->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('desc', 'like', "%{$search}%")
                        ->orWhere('penerbit', 'like', "%{$search}%");
                });
            }
        }

        return datatables()
            ->of($bukus)
            ->addColumn('action', function ($buku) {
                return view('book.partials.action', compact('buku'))->render();
            })
            ->editColumn('stock', function ($buku) {
                return $buku->stock ?? 0;
            })
            ->rawColumns(['action']) // wajib jika return HTML
            ->make(true);
    }
}
