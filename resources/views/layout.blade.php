<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>ERP E-Ticaret Modülü</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .expand-submenu {
            display: none;
            margin-bottom: 0.5rem;
            margin-left: 1rem;
        }
        .expand-submenu.show {
            display: block;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">ERP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" id="modulesMenu">
                        Modüller
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="modulesMenu">
                        <!-- Stok Yönetimi -->
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center menu-btn" data-submenu="stokYonetimiSubmenu">
                                Stok Yönetimi
                                <i class="bi bi-chevron-down ms-2"></i>
                            </button>
                            <div class="expand-submenu" id="stokYonetimiSubmenu">
                                <a class="dropdown-item" href="{{ route('products.index') }}">Ürünler</a>
                                <a class="dropdown-item" href="{{ route('products.create') }}">Ürün Ekle</a>
                            </div>
                        </li>
                        <!-- Sipariş Yönetimi -->
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center menu-btn" data-submenu="siparisYonetimiSubmenu">
                                Sipariş Yönetimi
                                <i class="bi bi-chevron-down ms-2"></i>
                            </button>
                            <div class="expand-submenu" id="siparisYonetimiSubmenu">
                                <a class="dropdown-item" href="{{ route('orders.index') }}">Siparişler</a>
                                <a class="dropdown-item" href="{{ route('orders.create') }}">Sipariş Ekle</a>
                            </div>
                        </li>
                        <!-- Müşteri Yönetimi -->
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center menu-btn" data-submenu="musteriYonetimiSubmenu">
                                Müşteri Yönetimi
                                <i class="bi bi-chevron-down ms-2"></i>
                            </button>
                            <div class="expand-submenu" id="musteriYonetimiSubmenu">
                                <a class="dropdown-item" href="{{ route('customers.index') }}">Müşteriler</a>
                                <a class="dropdown-item" href="{{ route('customers.create') }}">Müşteri Ekle</a>
                            </div>
                        </li>
                        <!-- Tedarikçi Yönetimi -->
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center menu-btn" data-submenu="tedarikciYonetimiSubmenu">
                                Tedarikçi Yönetimi
                                <i class="bi bi-chevron-down ms-2"></i>
                            </button>
                            <div class="expand-submenu" id="tedarikciYonetimiSubmenu">
                                <a class="dropdown-item" href="{{ route('suppliers.index') }}">Tedarikçiler</a>
                                <a class="dropdown-item" href="{{ route('suppliers.create') }}">Tedarikçi Ekle</a>
                            </div>
                        </li>
                        <!-- Fatura ve Ödeme -->
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center menu-btn" data-submenu="faturaYonetimiSubmenu">
                                Fatura ve Ödeme
                                <i class="bi bi-chevron-down ms-2"></i>
                            </button>
                            <div class="expand-submenu" id="faturaYonetimiSubmenu">
                                <a class="dropdown-item" href="{{ route('invoices.index') }}">Faturalar</a>
                                <a class="dropdown-item" href="{{ route('invoices.create') }}">Fatura Ekle</a>
                            </div>
                        </li>
                        <!-- Kullanıcı Yönetimi -->
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center menu-btn" data-submenu="kullaniciYonetimiSubmenu">
                                Kullanıcı Yönetimi
                                <i class="bi bi-chevron-down ms-2"></i>
                            </button>
                            <div class="expand-submenu" id="kullaniciYonetimiSubmenu">
                                <a class="dropdown-item" href="{{ route('users.index') }}">Kullanıcılar</a>
                                <a class="dropdown-item" href="{{ route('users.create') }}">Kullanıcı Ekle</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Dinamik alt menü/ikon yönetimi
document.addEventListener('DOMContentLoaded', function () {
    const menuBtns = document.querySelectorAll('.menu-btn');
    menuBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const submenuId = btn.getAttribute('data-submenu');
            const submenu = document.getElementById(submenuId);
            const icon = btn.querySelector('i');
            // Diğer alt menüleri kapat
            document.querySelectorAll('.expand-submenu').forEach(function(otherSub) {
                if (otherSub !== submenu) {
                    otherSub.classList.remove('show');
                }
            });
            // Diğer ikonları kapalı yap
            document.querySelectorAll('.menu-btn i').forEach(function(otherIcon) {
                if (otherIcon !== icon) {
                    otherIcon.classList.add('bi-chevron-down');
                    otherIcon.classList.remove('bi-chevron-up');
                }
            });
            // Kendi alt menüsünü aç/kapat
            submenu.classList.toggle('show');
            icon.classList.toggle('bi-chevron-down');
            icon.classList.toggle('bi-chevron-up');
        });
    });

    // Dropdown kapanınca tüm alt menüleri kapat ve ikonları indir
    document.querySelectorAll('.dropdown').forEach(function (dropdown) {
        dropdown.addEventListener('hide.bs.dropdown', function () {
            document.querySelectorAll('.expand-submenu').forEach(function(submenu){
                submenu.classList.remove('show');
            });
            document.querySelectorAll('.menu-btn i').forEach(function(icon){
                icon.classList.add('bi-chevron-down');
                icon.classList.remove('bi-chevron-up');
            });
        });
    });

    // Dropdown dışında bir yere tıklanırsa alt menüleri kapat ve ikonları indir
    document.addEventListener('click', function (e) {
        if (![...menuBtns].some(btn => btn.contains(e.target))) {
            document.querySelectorAll('.expand-submenu').forEach(function(submenu){
                submenu.classList.remove('show');
            });
            document.querySelectorAll('.menu-btn i').forEach(function(icon){
                icon.classList.add('bi-chevron-down');
                icon.classList.remove('bi-chevron-up');
            });
        }
    });
});
</script>
</body>
</html>