@extends('layout')

@section('content')
<h2>Sipariş Yönetimi</h2>
<a href="{{ route('orders.create') }}" class="btn btn-success mb-2">Yeni Sipariş Oluştur</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Müşteri</th>
        <th>Durum</th>
        <th>Tutar</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->name }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->total }}</td>
            <td>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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