<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin {{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
<div class="admin-body">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <h3>{{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</h3>
            <span>Admin Panel</span>
        </div>

        <nav class="admin-sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.news.index') }}" class="admin-nav-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> Kelola Berita
            </a>
            <a href="{{ route('admin.registrations.index') }}" class="admin-nav-item {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> Pendaftaran
            </a>
            <a href="{{ route('admin.messages.index') }}" class="admin-nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope"></i> Saran Masuk
            </a>
            <a href="{{ route('admin.settings.index') }}" class="admin-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-cog"></i> Pengaturan
            </a>
        </nav>

        <div class="admin-sidebar-footer">
            <div style="padding: 12px 24px; color: rgba(255,255,255,0.6); font-size: 0.85rem; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-user-circle"></i>
                <span>{{ Auth::guard('admin')->user()->full_name ?? 'Admin' }}</span>
            </div>
            <a href="{{ route('admin.logout') }}" class="admin-nav-item" style="color: rgba(255,100,100,0.8);"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-sign-out-alt"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>

    <main class="admin-main">
        @if (session('success'))
            <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error"><i class="fa-solid fa-exclamation-circle"></i> {{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</div>

<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
