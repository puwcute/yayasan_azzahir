@extends('layouts.app')

@section('title', 'Pendaftaran - ' . App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))

@section('content')
<section class="page-hero">
    <div class="hero-pattern-overlay" aria-hidden="true"></div>
    <div class="hero-dots" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
        <span class="calli-mark">طلب العلم فريضة</span>
        <div class="page-kicker">PPDB Online</div>
        <h1>Pendaftaran Santri Baru</h1>
        <p class="page-desc">Daftarkan putra-putri Anda untuk bergabung bersama Yayasan Azzahir Mojosari</p>
    </div>
</section>

<section style="padding: 80px 0;">
    <div class="container">
        @if(session('success'))
        <div class="form-card" style="max-width: 600px; margin: 0 auto; text-align: center; padding: 60px 40px;">
            <i class="fa-solid fa-check-circle" style="font-size: 4rem; color: var(--primary); margin-bottom: 20px;"></i>
            <h3 style="margin-bottom: 12px;">Pendaftaran Berhasil!</h3>
            <p style="color: var(--ink-muted);">Terima kasih telah mendaftar. Data pendaftaran Anda telah kami terima dan akan segera diproses.</p>
            <div style="margin-top: 28px;">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fa-solid fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
        @else
        <div class="form-card" style="max-width: 740px; margin: 0 auto;">
            <h3 style="text-align: center; margin-bottom: 8px;">Formulir Pendaftaran</h3>
            <p style="text-align: center; color: var(--ink-muted); margin-bottom: 32px; font-size: 0.9rem;">Isi data dengan lengkap dan benar</p>

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

            <form method="POST" action="{{ route('registration.store') }}" class="needs-validation">
                @csrf
                <div class="form-grid">
                    <div class="form-field">
                        <label for="full_name">Nama Lengkap <span style="color: #dc3545;">*</span></label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-field">
                        <label for="place_of_birth">Tempat Lahir</label>
                        <input type="text" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth') }}" placeholder="Contoh: Jakarta">
                    </div>
                    <div class="form-field">
                        <label for="date_of_birth">Tanggal Lahir</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    </div>
                    <div class="form-field">
                        <label for="gender">Jenis Kelamin</label>
                        <select id="gender" name="gender">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('gender') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('gender') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-field full">
                        <label for="address">Alamat</label>
                        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                    </div>
                    <div class="form-field">
                        <label for="phone">Nomor Telepon <span style="color: #dc3545;">*</span></label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Contoh: 081234567890">
                    </div>
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com">
                    </div>
                </div>

                <hr style="border: none; border-top: 1px solid var(--border); margin: 28px 0;">

                <h4 style="margin-bottom: 20px; color: var(--primary); font-size: 1.1rem;">
                    <i class="fa-solid fa-users"></i> Data Orang Tua / Wali
                </h4>

                <div class="form-grid">
                    <div class="form-field">
                        <label for="parent_name">Nama Orang Tua / Wali <span style="color: #dc3545;">*</span></label>
                        <input type="text" id="parent_name" name="parent_name" value="{{ old('parent_name') }}" required placeholder="Nama orang tua/wali">
                    </div>
                    <div class="form-field">
                        <label for="parent_phone">No. Telepon Orang Tua <span style="color: #dc3545;">*</span></label>
                        <input type="tel" id="parent_phone" name="parent_phone" value="{{ old('parent_phone') }}" required placeholder="Contoh: 081234567890">
                    </div>
                    <div class="form-field full">
                        <label for="program">Program Pendaftaran <span style="color: #dc3545;">*</span></label>
                        <select id="program" name="program" required>
                            <option value="">Pilih Program</option>
                            <option value="RA" {{ old('program') === 'RA' ? 'selected' : '' }}>RA Azzahir</option>
                            <option value="MI" {{ old('program') === 'MI' ? 'selected' : '' }}>MI Azzahir</option>
                            <option value="MTS" {{ old('program') === 'MTS' ? 'selected' : '' }}>MTS Azzahir</option>
                            <option value="Pesantren" {{ old('program') === 'Pesantren' ? 'selected' : '' }}>Pondok Pesantren Mandiri</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark btn-block" style="margin-top: 20px; padding: 16px;">
                    <i class="fa-solid fa-paper-plane"></i> Daftar Sekarang
                </button>
            </form>
        </div>
        @endif
    </div>
</section>
@endsection
