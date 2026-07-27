<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ App\Models\Setting::getValue('site_description', 'Yayasan & Pondok Pesantren Modern Azzahir Mojosari - RA, MI, MTS, dan Pondok Pesantren dengan pendidikan terpadu sains dan kepesantrenan.') }}">
    <title>@yield('title', App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

<!-- ===== HEADER ===== -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <a href="{{ route('home') }}" class="brand">
            <img class="brand-mark"
                 src="{{ asset('storage/image/' . App\Models\Setting::getValue('site_logo', 'logo.png')) }}"
                 alt="Logo Yayasan Azzahir"
                 onerror="this.style.display='none'">
            <div class="brand-text">
                <strong>{{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</strong>
                <span>Pondok Pesantren Modern · Mojosari</span>
            </div>
        </a>

        <nav class="nav-links" id="navLinks">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a>
            <a href="{{ route('registration') }}" class="nav-link {{ request()->routeIs('registration') ? 'active' : '' }}">Pendaftaran</a>
            <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">Berita</a>
            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Saran & Masukan</a>
        </nav>

        <div class="header-actions">
            <a href="{{ route('registration') }}" class="btn btn-primary">
                <i class="fa-solid fa-feather-pointed"></i> Daftar PPDB
            </a>
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<!-- ===== MAIN CONTENT ===== -->
@yield('content')

<!-- ===== FOOTER ===== -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="brand" style="color: var(--white);">
                    <img class="brand-mark"
                         src="{{ asset('storage/image/' . App\Models\Setting::getValue('site_logo', 'logo.png')) }}"
                         alt="Logo Yayasan Azzahir"
                         onerror="this.style.display='none'">
                    <div class="brand-text">
                        <strong style="color: var(--white);">{{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</strong>
                        <span style="color: var(--accent-soft); opacity: 0.7;">Mojosari</span>
                    </div>
                </div>
                <p>Pusat pendidikan Islam terpadu — menyerasikan ilmu, iman, dan taqwa generasi masa depan.</p>
            </div>

            <div class="footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('profile') }}">Profil Yayasan</a></li>
                    <li><a href="{{ route('profile') }}#program">Program Pendidikan</a></li>
                    <li><a href="{{ route('registration') }}">Pendaftaran PPDB</a></li>
                    <li><a href="{{ route('news.index') }}">Berita</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Program</h4>
                <ul>
                    <li><a href="{{ route('profile') }}">RA Azzahir</a></li>
                    <li><a href="{{ route('profile') }}">MI Azzahir</a></li>
                    <li><a href="{{ route('profile') }}">MTS Azzahir</a></li>
                    <li><a href="{{ route('profile') }}">Pondok Pesantren</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Kabar Azzahir</h4>
                <p style="font-size: 13.5px; opacity: 0.8;">
                    Dapatkan info PPDB dan kegiatan terbaru langsung ke email Anda.
                </p>
                <form class="newsletter-form" id="newsletterForm">
                    <input type="email" placeholder="Email Anda" required>
                    <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; <span id="year"></span> {{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }} Mojosari. Seluruh hak cipta dilindungi.</span>
        </div>
    </div>
</footer>

<button id="scrollTop" class="scroll-top" aria-label="Scroll to top">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
