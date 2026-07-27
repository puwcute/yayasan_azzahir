@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<div class="admin-header">
    <div><h1>Pengaturan</h1><p style="color: var(--text-muted);">Kelola pengaturan website</p></div>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf

    @foreach($groupedSettings as $group => $settings)
    <div class="admin-card">
        @php
            $labels = ['general' => 'Pengaturan Umum', 'contact' => 'Kontak', 'profile' => 'Profil'];
            $fieldLabels = [
                'site_name' => 'Nama Website', 'site_description' => 'Deskripsi Website',
                'site_logo' => 'Logo Website', 'about_image' => 'Gambar Profil (tentang)',
                'hero_image' => 'Gambar Hero Beranda',
                'address' => 'Alamat', 'phone' => 'Telepon',
                'email' => 'Email', 'maps_embed' => 'Embed Google Maps',
                'about_text' => 'Teks Tentang', 'vision' => 'Visi', 'mission' => 'Misi',
            ];
            $imageKeys = ['site_logo', 'about_image', 'hero_image'];
        @endphp
        <h3 style="margin-bottom: 24px;">{{ $labels[$group] ?? ucfirst($group) }}</h3>

        @foreach($settings as $setting)
        <div class="form-group">
            <label for="setting_{{ $setting->setting_key }}">{{ $fieldLabels[$setting->setting_key] ?? $setting->setting_key }}</label>

            @if(in_array($setting->setting_key, $imageKeys))
                <div style="display: flex; align-items: center; gap: 16px; flex-wrap: wrap;">
                    <div style="padding: 16px; background: var(--bg-section); border-radius: var(--radius-sm); border: 1px solid var(--border);">
                        <img src="{{ asset('storage/image/' . $setting->setting_value) }}" alt="{{ $fieldLabels[$setting->setting_key] ?? $setting->setting_key }}" style="height: 80px; max-width: 200px; object-fit: cover; border-radius: var(--radius-xs);" onerror="this.style.display='none'">
                        @if($setting->setting_value)
                        <p style="font-size: 0.82rem; color: var(--text-muted); margin-top: 8px;">File: {{ $setting->setting_value }}</p>
                        @else
                        <p style="font-size: 0.82rem; color: var(--gold); font-weight: 500; margin-top: 4px;">Belum ada gambar</p>
                        @endif
                    </div>
                    <div>
                        <input type="file" id="{{ $setting->setting_key }}" name="{{ $setting->setting_key }}" class="form-control" accept="image/*">
                        <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 6px;">Format: JPG, PNG, WebP. Maks: 5MB</p>
                    </div>
                </div>
            @elseif(in_array($setting->setting_key, ['about_text', 'vision', 'mission', 'address']))
                <textarea id="setting_{{ $setting->setting_key }}" name="settings[{{ $setting->setting_key }}]" class="form-control" rows="4">{{ $setting->setting_value }}</textarea>
            @elseif($setting->setting_key === 'maps_embed')
                <textarea id="setting_{{ $setting->setting_key }}" name="settings[{{ $setting->setting_key }}]" class="form-control" rows="3" placeholder="&lt;iframe src=&quot;...&quot;&gt;&lt;/iframe&gt;">{{ $setting->setting_value }}</textarea>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Masukkan kode embed iframe dari Google Maps.</p>
            @else
                <input type="text" id="setting_{{ $setting->setting_key }}" name="settings[{{ $setting->setting_key }}]" class="form-control" value="{{ $setting->setting_value }}">
            @endif
        </div>
        @endforeach
    </div>
    @endforeach

    <div style="text-align: right;">
        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Simpan Pengaturan</button>
    </div>
</form>
@endsection
