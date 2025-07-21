@extends('layout')

@section('content')
<h2>Ürün Düzenle</h2>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Ad:</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="mb-2">
        <label>SKU:</label>
        <input type="text" name="sku" class="form-control" value="{{ $product->sku }}" required>
    </div>
    <div class="mb-2">
        <label>Stok:</label>
        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
    </div>
    <div class="mb-2">
        <label>Fiyat:</label>
        <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection