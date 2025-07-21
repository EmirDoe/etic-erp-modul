@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>ERP Dashboard</h2>
        <div class="row">
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Stok</h5>
                        <p class="card-text">{{ \App\Models\Product::count() }} ürün</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Siparişler</h5>
                        <p class="card-text">{{ \App\Models\Order::count() }} sipariş</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Müşteriler</h5>
                        <p class="card-text">{{ \App\Models\Customer::count() }} müşteri</p>
                        <a href="{{ route('customers.index') }}" class="btn btn-primary">Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tedarikçiler</h5>
                        <p class="card-text">{{ \App\Models\Supplier::count() }} tedarikçi</p>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Faturalar</h5>
                        <p class="card-text">{{ \App\Models\Invoice::count() }} fatura</p>
                        <a href="{{ route('invoices.index') }}" class="btn btn-primary">Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Kullanıcılar</h5>
                        <p class="card-text">{{ \App\Models\User::count() }} kullanıcı</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Görüntüle</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection