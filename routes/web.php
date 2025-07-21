<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;

// Dashboard
Route::get('/', function () { return view('dashboard'); })->name('dashboard');

// Products (Stok Yönetimi)
Route::resource('products', ProductController::class);

// Customers (Müşteri Yönetimi)
Route::resource('customers', CustomerController::class);

// Orders (Sipariş Yönetimi)
Route::resource('orders', OrderController::class);

// Suppliers (Tedarikçi Yönetimi)
Route::resource('suppliers', SupplierController::class);

// Invoices (Fatura ve Ödeme)
Route::resource('invoices', InvoiceController::class);
Route::post('invoices/{id}/markPaid', [InvoiceController::class, 'markPaid'])->name('invoices.markPaid');

// Users (Kullanıcı Yönetimi)
Route::resource('users', UserController::class);