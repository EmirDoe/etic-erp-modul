@extends('layout')

@section('content')
<h2>Müşteri Düzenle</h2>
<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Ad:</label>
        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
    </div>
    <div class="mb-2">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
    </div>
    <div class="mb-2">
        <label>Telefon:</label>
        <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
    </div>
    <div class="mb-2">
        <label>Adres:</label>
        <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection