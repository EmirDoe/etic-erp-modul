@extends('layout')

@section('content')
<h2>Yeni Sipariş Oluştur</h2>
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Müşteri:</label>
        <select name="customer_id" class="form-control" required>
            @foreach($customers as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Ürünler:</label>
        @foreach($products as $p)
            <div class="input-group mb-1">
                <span class="input-group-text">{{ $p->name }} (Stok: {{ $p->stock }})</span>
                <input type="number" name="products[{{ $p->id }}]" class="form-control" value="0" min="0">
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection