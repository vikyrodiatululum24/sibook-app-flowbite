<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function customerIndex()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:customers,name',
        ]);
        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function storeKeluar(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:customers,name',
        ]);
        Customer::create($request->all());
        return redirect()->back()->with('success', 'Customer berhasil ditambahkan.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success', 'Customer berhasil diupdate.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }

        public function data(Request $request)
    {
        $customers = Customer::query();
        if ($request->has('search') && $request->input('search.value') !== null) {
            $search = $request->input('search.value');
            if (!empty($search)) {
                $customers->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('desc', 'like', "%{$search}%")
                        ->orWhere('penerbit', 'like', "%{$search}%");
                });
            }
        }

        return datatables()
            ->of($customers)
            ->addColumn('action', function ($customer) {
                return view('customer.partials.action', compact('customer'))->render();
            })
            ->rawColumns(['action']) // wajib jika return HTML
            ->make(true);
    }

}
