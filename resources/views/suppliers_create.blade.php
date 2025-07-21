@extends('layout')

@section('content')
<h2>Yeni Tedarikçi Ekle</h2>
<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Ad:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Email:</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-2">
        <label>Telefon:</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-2">
        <label>Adres:</label>
        <input type="text" name="address" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection