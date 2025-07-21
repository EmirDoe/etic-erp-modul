@extends('layout')

@section('content')
<h2>Sipariş Düzenle</h2>
<form action="{{ route('orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Durum:</label>
        <select name="status" class="form-control">
            <option value="pending" @if($order->status == 'pending') selected @endif>Bekliyor</option>
            <option value="completed" @if($order->status == 'completed') selected @endif>Tamamlandı</option>
            <option value="cancelled" @if($order->status == 'cancelled') selected @endif>İptal Edildi</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection