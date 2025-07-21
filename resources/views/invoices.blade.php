@extends('layout')

@section('content')
<h2>Fatura ve Ödeme</h2>
<a href="{{ route('invoices.create') }}" class="btn btn-success mb-2">Yeni Fatura Oluştur</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Sipariş</th>
        <th>Tutar</th>
        <th>Durum</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->order->id }}</td>
            <td>{{ $invoice->amount }}</td>
            <td>{{ $invoice->status }}</td>
            <td>
                @if($invoice->status === 'unpaid')
                    <form action="{{ route('invoices.markPaid', $invoice->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-success btn-sm">Ödendi Olarak İşaretle</button>
                    </form>
                @endif
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
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