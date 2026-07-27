@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="admin-header">
    <div>
        <h1>Dashboard</h1>
        <p style="color: var(--ink-muted);">
            Selamat datang, {{ optional(auth('admin')->user())->full_name ?? 'Admin' }}
        </p>
    </div>
    <a href="{{ route('home') }}" class="btn btn-dark btn-sm" target="_blank">
        <i class="fa-solid fa-external-link-alt"></i> Lihat Website
    </a>
</div>

<div class="admin-stats">
    <div class="admin-stat-card">
        <div class="admin-stat-icon green"><i class="fa-solid fa-newspaper"></i></div>
        <div class="admin-stat-info">
            <h3>{{ $publishedNews ?? 0 }}</h3>
            <p>Berita Publikasi</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon gold"><i class="fa-solid fa-users"></i></div>
        <div class="admin-stat-info">
            <h3>{{ $totalRegistrations ?? 0 }}</h3>
            <p>Total Pendaftaran</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon blue"><i class="fa-solid fa-hourglass-half"></i></div>
        <div class="admin-stat-info">
            <h3>{{ $pendingRegistrations ?? 0 }}</h3>
            <p>Pending</p>
        </div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon red"><i class="fa-solid fa-envelope"></i></div>
        <div class="admin-stat-info">
            <h3>{{ $unreadMessages ?? 0 }}</h3>
            <p>Saran Belum Dibaca</p>
        </div>
    </div>
</div>

<!-- ===== GALERI FOTO TERBARU ===== -->
<div class="admin-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3><i class="fa-solid fa-images" style="color: var(--gold);"></i> Galeri Foto Terbaru</h3>
        <span style="font-size: 0.85rem; color: var(--ink-muted);">Total: {{ $totalGallery ?? 0 }} foto</span>
    </div>

    @if(isset($latestGallery) && $latestGallery->isNotEmpty())
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 12px;">
        @foreach($latestGallery as $photo)
        <div style="border-radius: var(--radius-sm); overflow: hidden; border: 1px solid var(--border); transition: var(--transition); position: relative;">
            @if($photo->image_path)
            <img src="{{ asset('storage/image/' . $photo->image_path) }}"
                alt="{{ $photo->title ?? 'Foto' }}"
                style="width: 100%; height: 120px; object-fit: cover; display: block;"
                onerror="handleImgError(this)">
            @endif
            <div class="placeholder {{ $photo->image_path ? 'hidden' : '' }}" style="width: 100%; height: 120px; background: linear-gradient(135deg, var(--gold-lighter), var(--primary-bg)); display: flex; align-items: center; justify-content: center;">
                <i class="fa-solid fa-image" style="font-size: 2rem; color: var(--gold); opacity: 0.5;"></i>
            </div>
            <div style="padding: 8px 10px; background: var(--bg-card);">
                <p style="font-size: 0.78rem; color: var(--ink-soft); font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $photo->title ?? 'Tanpa judul' }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div style="text-align: center; padding: 40px 20px;">
        <i class="fa-solid fa-images" style="font-size: 2.5rem; color: var(--gold); opacity: 0.4; margin-bottom: 12px;"></i>
        <p style="color: var(--ink-muted);">Belum ada foto di galeri.</p>
        <p style="font-size: 0.85rem; color: var(--ink-muted); margin-top: 8px;">
            Upload foto manual ke folder <code>storage/app/public/image/</code>
            lalu isi data di database tabel <code>gallery</code> (title, image_path, category).
            <br>Contoh: jika image_path diisi <code>galeri1.jpg</code>, maka file diletakkan di <code>storage/app/public/image/galeri1.jpg</code>.
        </p>
    </div>
    @endif
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3>Pendaftaran Terbaru</h3>
            <a href="{{ route('admin.registrations.index') }}" class="btn btn-sm btn-dark">Lihat Semua</a>
        </div>
        @if(isset($latestRegistrations) && $latestRegistrations->isNotEmpty())
        <div class="table-wrapper">
            <table class="admin-table">
                <thead><tr><th>No. Daftar</th><th>Nama</th><th>Program</th><th>Status</th></tr></thead>
                <tbody>
                    @foreach($latestRegistrations as $reg)
                    <tr>
                        <td>{{ $reg->registration_number }}</td>
                        <td>{{ $reg->full_name }}</td>
                        <td>{{ $reg->program }}</td>
                        <td><span class="badge badge-{{ $reg->status === 'approved' ? 'success' : ($reg->status === 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($reg->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p style="color: var(--ink-muted); text-align: center; padding: 20px;">Belum ada pendaftaran.</p>
        @endif
    </div>

    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
            <h3>Saran Terbaru</h3>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-dark">Lihat Semua</a>
        </div>
        @if(isset($latestMessages) && $latestMessages->isNotEmpty())
        <div class="table-wrapper">
            <table class="admin-table">
                <thead><tr><th>Nama</th><th>Subjek</th><th>Tanggal</th><th>Status</th></tr></thead>
                <tbody>
                    @foreach($latestMessages as $msg)
                    <tr>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->subject ?: '(Tanpa subjek)' }}</td>
                        <td>{{ $msg->created_at->format('d M Y') }}</td>
                        <td><span class="badge badge-{{ $msg->is_read ? 'success' : 'warning' }}">{{ $msg->is_read ? 'Dibaca' : 'Baru' }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p style="color: var(--ink-muted); text-align: center; padding: 20px;">Belum ada saran.</p>
        @endif
    </div>
</div>
@endsection