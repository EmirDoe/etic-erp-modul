<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Tedarikçi eklendi!');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers_edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Tedarikçi güncellendi!');
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('suppliers.index')->with('success', 'Tedarikçi silindi!');
    }
}