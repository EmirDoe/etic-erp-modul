<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('order')->get();
        return view('invoices', compact('invoices'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('invoices_create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount'   => 'required|numeric',
        ]);
        Invoice::create([
            'order_id' => $request->order_id,
            'amount'   => $request->amount,
            'status'   => 'unpaid'
        ]);
        return redirect()->route('invoices.index')->with('success', 'Fatura oluşturuldu!');
    }

    public function edit($id)
    {
        $invoice = \App\Models\Invoice::findOrFail($id);
        $orders = \App\Models\Order::all();
        return view('invoices_edit', compact('invoice', 'orders'));
    }
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());
        return redirect()->route('invoices.index')->with('success', 'Fatura güncellendi!');
    }
    public function destroy($id)
    {
        Invoice::destroy($id);
        return redirect()->route('invoices.index')->with('success', 'Fatura silindi!');
    }

    public function markPaid($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['status' => 'paid']);
        return redirect()->route('invoices.index')->with('success', 'Fatura ödendi olarak işaretlendi!');
    }
}