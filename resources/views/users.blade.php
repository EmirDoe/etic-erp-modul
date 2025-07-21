@extends('layout')

@section('content')
<h2>Kullanıcı Yönetimi</h2>
<a href="{{ route('users.create') }}" class="btn btn-success mb-2">Yeni Kullanıcı Ekle</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Ad</th>
        <th>Email</th>
        <th>Admin?</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->is_admin ? 'Evet' : 'Hayır' }}</td>
            <td>
                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline;">
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