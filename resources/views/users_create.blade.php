@extends('layout')

@section('content')
<h2>Yeni Kullanıcı Ekle</h2>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Ad:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Şifre:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-2 form-check">
        <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin">
        <label class="form-check-label" for="is_admin">Admin mi?</label>
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection