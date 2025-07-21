@extends('layout')

@section('content')
<h2>Müşteri Yönetimi</h2>
<a href="{{ route('customers.create') }}" class="btn btn-success mb-2">Yeni Müşteri Ekle</a>
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
    @foreach($customers as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->phone }}</td>
            <td>{{ $c->address }}</td>
            <td>
                <a href="{{ route('customers.edit', $c->id) }}" class="btn btn-primary btn-sm">Düzenle</a>
                <form action="{{ route('customers.destroy', $c->id) }}" method="POST" style="display:inline;">
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