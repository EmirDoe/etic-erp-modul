@extends('layout')

@section('content')
<h2>Yeni Ürün Ekle</h2>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Ad:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>SKU:</label>
        <input type="text" name="sku" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Stok:</label>
        <input type="number" name="stock" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Fiyat:</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection