<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers', compact('customers'));
    }

    public function create()
    {
        return view('customers_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:customers',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Müşteri eklendi!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers_edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Müşteri güncellendi!');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Müşteri silindi!');
    }
}