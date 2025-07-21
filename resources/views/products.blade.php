@extends('layout')

@section('content')
<h2>Stok Yönetimi - Ürünler</h2>
<a href="{{ route('products.create') }}" class="btn btn-success mb-2">Yeni Ürün Ekle</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ad</th>
            <th>SKU</th>
            <th>Stok</th>
            <th>Fiyat</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->price }}</td>
            <td>
                <a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection