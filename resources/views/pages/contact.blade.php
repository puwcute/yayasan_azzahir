@extends('layouts.app')

@section('title', 'Saran & Masukan - ' . App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))

@section('content')
<section class="page-hero">
    <div class="hero-pattern-overlay" aria-hidden="true"></div>
    <div class="hero-dots" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
        <span class="calli-mark">والعصر</span>
        <div class="page-kicker">Saran &amp; Masukan</div>
        <h1>Saran &amp; Masukan</h1>
        <p class="page-desc">Kami sangat menghargai saran dan masukan dari Anda untuk kemajuan yayasan</p>
    </div>
</section>

<section style="padding: 80px 0;">
    <div class="container">
        <div class="contact-grid">
            <div>
                @if(session('success'))
                <div class="form-card" style="max-width: 100%; text-align: center; padding: 60px 40px;">
                    <i class="fa-solid fa-check-circle" style="font-size: 4rem; color: var(--primary); margin-bottom: 20px;"></i>
                    <h3 style="margin-bottom: 12px;">Saran Terkirim!</h3>
                    <p style="color: var(--ink-muted);">Terima kasih, saran dan masukan Anda telah kami terima.</p>
                    <div style="margin-top: 24px;">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fa-solid fa-home"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
                @else
                <div class="form-card" style="max-width: 100%;">
                    <h3 style="margin-bottom: 24px;">Kirim Saran & Masukan</h3>

                    @if($errors->any())
                    <div class="alert alert-error">
                        <i class="fa-solid fa-exclamation-circle"></i>
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="needs-validation">
                        @csrf
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            <div class="form-field">
                                <label for="category">Kategori Saran <span style="color: #dc3545;">*</span></label>
                                <select id="category" name="category" required>
                                    <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih kategori</option>
                                    <option value="Sarana Prasarana" {{ old('category') === 'Sarana Prasarana' ? 'selected' : '' }}>Sarana &amp; Prasarana</option>
                                    <option value="Kurikulum" {{ old('category') === 'Kurikulum' ? 'selected' : '' }}>Kurikulum</option>
                                    <option value="Tenaga Pendidik" {{ old('category') === 'Tenaga Pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                    <option value="Pelayanan" {{ old('category') === 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                                    <option value="Lainnya" {{ old('category') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-field">
                                <label for="message">Isi Saran / Masukan <span style="color: #dc3545;">*</span></label>
                                <textarea id="message" name="message" rows="6" required placeholder="Tulis saran atau masukan Anda di sini..." style="min-height: 160px;">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block" style="padding: 16px; margin-top: 20px;">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Saran
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <div>
                <div class="contact-info-card">
                    <h3>Informasi Kontak</h3>
                    <div class="contact-row">
                        <div class="ico"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <strong>Alamat</strong>
                            <span>{{ App\Models\Setting::getValue('address', 'Desa Mojosari, Kecamatan Belitang, Kabupaten OKU Timur') }}</span>
                        </div>
                    </div>
                    <div class="contact-row">
                        <div class="ico"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <strong>Telepon</strong>
                            <span>{{ App\Models\Setting::getValue('phone', '+62 831-7205-9049') }}</span>
                        </div>
                    </div>
                    <div class="contact-row">
                        <div class="ico"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <strong>Email</strong>
                            <span>{{ App\Models\Setting::getValue('email', 'yysnazzahirnuristiqomah@gmail.com') }}</span>
                        </div>
                    </div>
                    <div class="contact-row">
                        <div class="ico"><i class="fa-solid fa-clock"></i></div>
                        <div>
                            <strong>Jam Layanan</strong>
                            <span>Senin - Sabtu: 07.30 - 14.00 WIB</span>
                        </div>
                    </div>

                    <div class="social-row">
                        <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        @php $mapsEmbed = App\Models\Setting::getValue('maps_embed', ''); $mapsUrl = 'https://www.google.com/maps/place/Yayasan+Azzahir+Nur+Istiqomah/@-4.1398328,104.6265992,17z/data=!3m1!4b1!4m6!3m5!1s0x2e3919acefdcf293:0x1e39456efcdf9972!8m2!3d-4.1398328!4d104.6291741!16s%2Fg%2F11v0jhw41t?entry=ttu&g_ep=EgoyMDI2MDcyMi4wIKXMDSoASAFQAw%3D%3D'; @endphp
        <div class="map-container" style="position: relative; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--border); box-shadow: var(--shadow-sm); margin-top: 32px; transition: box-shadow 0.3s ease, border-color 0.3s ease;" onmouseenter="this.style.boxShadow='var(--shadow-md)'; this.style.borderColor='var(--gold-light)'" onmouseleave="this.style.boxShadow='var(--shadow-sm)'; this.style.borderColor='var(--border)'">
            @if($mapsEmbed)
                {!! $mapsEmbed !!}
            @else
            <div style="height: 320px; display: flex; align-items: center; justify-content: center; background: var(--gold-lighter); color: var(--ink-muted);">
                <div style="text-align: center;">
                    <i class="fa-solid fa-map-marked-alt" style="font-size: 2rem; margin-bottom: 8px; color: var(--gold);"></i>
                    <p style="margin-top: 8px;">Klik untuk buka Google Maps</p>
                </div>
            </div>
            @endif
            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Buka lokasi di Google Maps" style="position: absolute; inset: 0; z-index: 10; cursor: pointer;"></a>
        </div>
    </div>
</section>
@endsection
