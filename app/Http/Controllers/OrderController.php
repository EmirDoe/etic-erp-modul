<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders_create', compact('customers', 'products'));
    }
    public function edit($id)
    {
        $order = Order::with('customer', 'items.product')->findOrFail($id);
        return view('orders_edit', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Sipariş güncellendi!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'products' => 'required|array',
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $total = 0;
        foreach ($request->products as $product_id => $quantity) {
            $product = Product::find($product_id);
            $line_total = $product->price * $quantity;
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);
            $product->decrement('stock', $quantity);
            $total += $line_total;
        }
        $order->update(['total' => $total]);

        return redirect()->route('orders.index')->with('success', 'Sipariş oluşturuldu!');
    }
}