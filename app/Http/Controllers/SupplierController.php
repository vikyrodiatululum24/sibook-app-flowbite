<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Supplier::create($request->all());
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Supplier::create($request->all());
        return redirect()->back()->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diupdate.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus.');
    }

    public function data(Request $request)
    {
        $suppliers = Supplier::query();
        if ($request->has('search') && $request->input('search.value') !== null) {
            $search = $request->input('search.value');
            if (!empty($search)) {
                $suppliers->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            }
        }

        return datatables()
            ->of($suppliers)
            ->addColumn('action', function ($supplier) {
                return view('supplier.partials.action', compact('supplier'))->render();
            })
            ->rawColumns(['action']) // wajib jika return HTML
            ->make(true);
    }
}
