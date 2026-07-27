@extends('layouts.admin')

@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="admin-header">
    <div>
        <h1>{{ isset($news) ? 'Edit Berita' : 'Tambah Berita' }}</h1>
    </div>
</div>

<div class="admin-card">
    <form method="POST" action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($news)) @method('PUT') @endif

        <div class="form-group">
            <label for="title">Judul Berita</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $news->title ?? '') }}" required>
            @error('title') <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="category">Kategori</label>
                <select id="category" name="category" class="form-control">
                    <option value="artikel" {{ old('category', $news->category ?? '') === 'artikel' ? 'selected' : '' }}>Artikel</option>
                    <option value="kegiatan" {{ old('category', $news->category ?? '') === 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="pengumuman" {{ old('category', $news->category ?? '') === 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="lainnya" {{ old('category', $news->category ?? '') === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="draft" {{ old('status', $news->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $news->status ?? '') === 'published' ? 'selected' : '' }}>Publikasi</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt">Ringkasan (Excerpt)</label>
            <textarea id="excerpt" name="excerpt" class="form-control" rows="3">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Konten</label>
            <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $news->content ?? '') }}</textarea>
            @error('content') <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="featured_image">Gambar Utama</label>
            <input type="file" id="featured_image" name="featured_image" class="form-control" accept="image/*">
            @error('featured_image') <span style="color: #dc3545; font-size: 0.85rem;">{{ $message }}</span> @enderror
            @if(!empty($news->featured_image))
                <p style="margin-top: 8px; color: var(--text-muted); font-size: 0.85rem;">Gambar saat ini: {{ $news->featured_image }}</p>
            @endif
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-outline"><i class="fas fa-times"></i> Batal</a>
        </div>
    </form>
</div>
@endsection
