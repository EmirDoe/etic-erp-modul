@extends('layout')

@section('content')
<h2>Fatura Düzenle</h2>
<form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Tutar:</label>
        <input type="number" name="amount" step="0.01" class="form-control" value="{{ $invoice->amount }}" required>
    </div>
    <div class="mb-2">
        <label>Durum:</label>
        <select name="status" class="form-control">
            <option value="unpaid" @if($invoice->status == 'unpaid') selected @endif>Ödenmedi</option>
            <option value="paid" @if($invoice->status == 'paid') selected @endif>Ödendi</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection