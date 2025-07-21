@extends('layout')

@section('content')
<h2>Yeni Fatura Oluştur</h2>
<form action="{{ route('invoices.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Sipariş:</label>
        <select name="order_id" class="form-control" required>
            @foreach($orders as $order)
                <option value="{{ $order->id }}">#{{ $order->id }} - {{ $order->customer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label>Tutar:</label>
        <input type="number" name="amount" step="0.01" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection