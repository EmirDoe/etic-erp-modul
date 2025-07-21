@extends('layout')

@section('content')
<h2>Tedarikçi Yönetimi</h2>
<a href="{{ route('suppliers.create') }}" class="btn btn-success mb-2">Yeni Tedarikçi Ekle</a>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Ad</th>
        <th>Email</th>
        <th>Telefon</th>
        <th>Adres</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach($suppliers as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->email }}</td>
            <td>{{ $s->phone }}</td>
            <td>{{ $s->address }}</td>
            <td>
                <a href="{{ route('suppliers.edit', $s->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                <form action="{{ route('suppliers.destroy', $s->id) }}" method="POST" style="display:inline;">
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