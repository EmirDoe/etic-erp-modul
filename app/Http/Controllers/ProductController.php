<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'sku'   => 'required|unique:products',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Ürün eklendi!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products_edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Ürün güncellendi!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Ürün silindi!');
    }
}