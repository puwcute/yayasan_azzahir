@extends('layouts.app')

@section('title', 'Profil - ' . App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))

@section('content')
<!-- ===== PAGE HERO ===== -->
<section class="page-hero" style="min-height: 30vh;">
    <div class="hero-pattern-overlay" aria-hidden="true"></div>
    <div class="hero-dots" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
        <div class="page-kicker">Profil Yayasan</div>
        <h1>Profil {{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</h1>
        <p class="page-desc">Mengenal lebih dekat visi, misi, dan sejarah yayasan kami</p>
    </div>
</section>

<!-- ===== TENTANG ===== -->
<section id="tentang" style="padding: 60px 0;">
    <div class="container about-grid" style="gap: 40px;">
        <div class="about-visual reveal">
            <div class="about-frame jenjang-frame-photo">
                @php $aboutImg = App\Models\Setting::getValue('about_image', ''); @endphp
                @if($aboutImg)
                    <img src="{{ asset('storage/image/' . $aboutImg) }}" alt="Tentang Yayasan Azzahir" style="width: 100%; height: 100%; min-height: 400px; object-fit: cover;" onerror="this.style.display='none'">
                @else
                    <div style="width: 100%; height: 100%; min-height: 400px; background: linear-gradient(135deg, var(--gold-lighter), var(--primary-bg)); display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-building-columns" style="font-size: 5rem; color: var(--gold); opacity: 0.5;"></i>
                    </div>
                @endif
                <div class="quote-chip">"Ilmu tanpa adab bagaikan pelita tanpa sumbu." — Prinsip Asuh Azzahir</div>
            </div>
        </div>

        <div class="about-body reveal">
            <div class="eyebrow">Profil Yayasan</div>
            <h2 style="margin-bottom: 20px;">Tentang {{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</h2>
            <p>{{ nl2br(App\Models\Setting::getValue('about_text', 'Selamat datang di Yayasan Azzahir. Berdiri sejak lebih dari satu dekade lalu, Yayasan Azzahir Mojosari mengelola satuan pendidikan berjenjang — RA, MI, MTS — beserta Pondok Pesantren Modern yang menaunginya.')) }}</p>
            <p>Kami percaya bahwa pendidikan yang baik adalah fondasi untuk membangun generasi yang unggul, tidak hanya dalam ilmu pengetahuan tetapi juga dalam iman dan taqwa kepada Allah SWT.</p>

            <div class="about-pillars">
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-book-quran"></i></div>
                    <div>
                        <h4>Tahfidz Al-Qur'an</h4>
                        <p>Target hafalan bertahap tiap jenjang</p>
                    </div>
                </div>
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-language"></i></div>
                    <div>
                        <h4>Bahasa Aktif</h4>
                        <p>Kelas intensif Arab &amp; Inggris</p>
                    </div>
                </div>
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-scroll"></i></div>
                    <div>
                        <h4>Kitab Turats</h4>
                        <p>Kajian Fiqih, Aqidah, Nahwu-Shorof</p>
                    </div>
                </div>
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-microchip"></i></div>
                    <div>
                        <h4>Teknologi &amp; Robotik</h4>
                        <p>Ekstrakurikuler komputer terapan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== VISI MISI ===== -->
<section class="bg-alt" style="padding: 60px 0;">
    <div class="container">
        <div class="content-grid">
            <div class="about-body">
                <div class="eyebrow">Visi &amp; Misi</div>
                <h2 style="margin-bottom: 24px;">Visi &amp; Misi Yayasan</h2>

                <div style="padding: 24px; background: var(--bg-card); border-radius: var(--radius-sm); border: 1px solid var(--border-light); margin-bottom: 20px;">
                    <h3 style="color: var(--primary); font-size: 1.2rem; margin-bottom: 10px;">
                        Visi
                    </h3>
                    <p style="color: var(--ink-muted); line-height: 1.8;">{{ App\Models\Setting::getValue('vision', 'Menjadi lembaga pendidikan Islam yang unggul dan berakhlak mulia.') }}</p>
                </div>                    <div style="padding: 24px; background: var(--bg-card); border-radius: var(--radius-sm); border: 1px solid var(--border-light);">
                    <h3 style="color: var(--primary); font-size: 1.2rem; margin-bottom: 10px;">
                        Misi
                    </h3>
                    <p style="color: var(--ink-muted); line-height: 1.8;">{{ App\Models\Setting::getValue('mission', 'Mendidik generasi Qur\'ani yang berilmu, beriman, dan bertaqwa.') }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== PROGRAM ===== -->
<section id="program" style="padding: 60px 0;">
    <div class="container">
        <div class="ornament-divider">
            <span class="line"></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M12 2L13.8 9.5L21 12L13.8 14.5L12 22L10.2 14.5L3 12L10.2 9.5Z"/>
            </svg>
            <span class="line right"></span>
        </div>
        <div class="section-head center reveal">
            <div class="eyebrow">Program Unggulan</div>
            <h2>Program yang Tumbuh Bersama Usia Santri</h2>
            <p>Berbagai program yang kami tawarkan untuk pengembangan pendidikan Islam</p>
        </div>

        <div class="program-grid">
            <div class="program-card reveal">
                <span class="num">JENJANG 01</span>
                <div class="ico"><i class="fa-solid fa-child" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>RA Azzahir</h3>
                <p><strong style="color: var(--primary)">Sejak 2022</strong> &bull; Raudhatul Athfal — pembentukan karakter islami dan motorik anak lewat suasana bermain yang hangat.</p>
                <a href="{{ route('registration') }}" class="learn">Info pendaftaran <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="program-card reveal">
                <span class="num">JENJANG 02</span>
                <div class="ico"><i class="fa-solid fa-school" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>MI Azzahir</h3>
                <p><strong style="color: var(--primary)">Sejak 2023</strong> &bull; Madrasah Ibtidaiyah — dasar sains berpadu metode cepat baca Al-Qur'an dan pembiasaan ibadah harian.</p>
                <a href="{{ route('registration') }}" class="learn">Info pendaftaran <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="program-card reveal">
                <span class="num">JENJANG 03</span>
                <div class="ico"><i class="fa-solid fa-graduation-cap" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>MTS Azzahir</h3>
                <p><strong style="color: var(--primary)">Sejak 2023</strong> &bull; Madrasah Tsanawiyah — kelas bilingual, target hafalan 5 juz, dan opsi berasrama bagi santri fokus.</p>
                <a href="{{ route('registration') }}" class="learn">Info pendaftaran <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="program-card reveal">
                <span class="num">JENJANG 04</span>
                <div class="ico"><i class="fa-solid fa-building-columns" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>Pondok Pesantren</h3>
                <p><strong style="color: var(--primary)">Sejak 2022</strong> &bull; Sistem klasikal modern — kajian kitab turats, tahfidz, dan bahasa aktif dalam asuhan penuh 24 jam.</p>
                <a href="{{ route('registration') }}" class="learn">Info pendaftaran <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ===== STRUKTUR ===== -->
<section class="bg-alt" id="struktur" style="padding: 60px 0;">
    <div class="container">
        <div class="section-head center reveal">
            <div class="eyebrow">Struktur Pengurus</div>
            <h2>Diasuh oleh Tenaga Pendidik Berpengalaman</h2>
            <p>Setiap jenjang dipimpin oleh kepala satuan yang berkoordinasi langsung dengan pengasuh pondok.</p>
        </div>

        <div class="team-grid">
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-user-tie"></i></div>
                <h4>Muhammad Rifa'i</h4>
                <span class="team-role">Pengasuh Pesantren</span>
                <p class="team-desc">Membina arah kepesantrenan, kajian kitab, dan pembinaan santri berasrama.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4>Ninin Kurniawati, S. Pd., Gr.</h4>
                <span class="team-role">Kepala RA Azzahir</span>
                <p class="team-desc">Merancang kegiatan bermain-sambil-belajar untuk usia dini.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4>Ria Lailiana, S. Pd.</h4>
                <span class="team-role">Kepala MI Azzahir</span>
                <p class="team-desc">Mengawal capaian sains dasar dan program tahfidz jenjang MI.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4>Yuni Purwanti, S. Pd.</h4>
                <span class="team-role">Kepala MTS Azzahir</span>
                <p class="team-desc">Memimpin kelas bilingual serta program boarding santri MTS.</p>
            </div>
        </div>

        @php $mapsEmbed = App\Models\Setting::getValue('maps_embed', ''); $mapsUrl = 'https://www.google.com/maps/place/Yayasan+Azzahir+Nur+Istiqomah/@-4.1398328,104.6265992,17z/data=!3m1!4b1!4m6!3m5!1s0x2e3919acefdcf293:0x1e39456efcdf9972!8m2!3d-4.1398328!4d104.6291741!16s%2Fg%2F11v0jhw41t?entry=ttu&g_ep=EgoyMDI2MDcyMi4wIKXMDSoASAFQAw%3D%3D'; @endphp
        <div style="margin-top: 40px; position: relative; border-radius: var(--radius-md); overflow: hidden; border: 1px solid transparent; transition: box-shadow 0.3s ease, border-color 0.3s ease;" onmouseenter="this.style.boxShadow='var(--shadow-md)'; this.style.borderColor='var(--gold-light)'" onmouseleave="this.style.boxShadow='var(--shadow-sm)'; this.style.borderColor='transparent'">
            @if($mapsEmbed)
                {!! $mapsEmbed !!}
            @else
            <iframe
                src="https://maps.google.com/maps?q=-4.1398328,104.6265992&t=&z=15&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="400"
                style="border: 0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            @endif
            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Buka lokasi di Google Maps" style="position: absolute; inset: 0; z-index: 10; cursor: pointer;"></a>
        </div>
    </div>
</section>
@endsection
