@extends('layout')

@section('content')
<h2>Kullanıcı Düzenle</h2>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Ad:</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>
    <div class="mb-2">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>
    <div class="mb-2 form-check">
        <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin" @if($user->is_admin) checked @endif>
        <label class="form-check-label" for="is_admin">Admin mi?</label>
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Geri Dön</a>
</form>
@endsection