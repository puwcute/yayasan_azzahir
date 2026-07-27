@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="admin-header">
    <div>
        <h1>Kelola Berita</h1>
        <p style="color: var(--text-muted);">{{ $newsList->total() }} berita total</p>
    </div>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Berita
    </a>
</div>

<div class="admin-card">
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr><th>Judul</th><th>Kategori</th><th>Penulis</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($newsList as $item)
                <tr>
                    <td><strong>{{ Str::limit($item->title, 50) }}</strong></td>
                    <td><span class="badge badge-info">{{ ucfirst($item->category) }}</span></td>
                    <td>{{ $item->author->full_name ?? '-' }}</td>
                    <td><span class="badge badge-{{ $item->status === 'published' ? 'success' : 'warning' }}">{{ $item->status === 'published' ? 'Publikasi' : 'Draft' }}</span></td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn-icon" title="Edit"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display:inline;" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon danger" title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">Belum ada berita.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 16px;">{{ $newsList->links() }}</div>
</div>
@endsection
