@extends('layouts.admin')

@section('title', 'Kelola Pendaftaran')

@section('content')
<div class="admin-header">
    <div>
        <h1>Kelola Pendaftaran</h1>
        <p style="color: var(--text-muted);">{{ $registrations->count() }} pendaftaran ditemukan</p>
    </div>
</div>

<div class="admin-card" style="margin-bottom: 24px;">
    <form method="GET" action="" style="display: flex; gap: 16px; flex-wrap: wrap; align-items: end;">
        <div class="form-group" style="margin-bottom: 0; min-width: 150px;">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 0; min-width: 150px;">
            <label for="program">Program</label>
            <select id="program" name="program" class="form-control">
                <option value="">Semua Program</option>
                <option value="Tahfidz" {{ request('program') === 'Tahfidz' ? 'selected' : '' }}>Tahfidz</option>
                <option value="TPA" {{ request('program') === 'TPA' ? 'selected' : '' }}>TPA</option>
                <option value="Madrasah" {{ request('program') === 'Madrasah' ? 'selected' : '' }}>Madrasah</option>
                <option value="Lainnya" {{ request('program') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-filter"></i> Filter</button>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-outline btn-sm"><i class="fas fa-undo"></i> Reset</a>
    </form>
</div>

<div class="admin-card">
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr><th>No. Daftar</th><th>Nama Lengkap</th><th>Program</th><th>Telepon</th><th>Orang Tua</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($registrations as $reg)
                <tr>
                    <td><strong>{{ $reg->registration_number }}</strong></td>
                    <td>{{ $reg->full_name }}</td>
                    <td><span class="badge badge-info">{{ $reg->program }}</span></td>
                    <td>{{ $reg->phone ?: '-' }}</td>
                    <td>{{ $reg->parent_name ?: '-' }}</td>
                    <td>{{ $reg->created_at->format('d M Y') }}</td>
                    <td>
                        <span class="badge badge-{{ $reg->status === 'approved' ? 'success' : ($reg->status === 'rejected' ? 'danger' : 'warning') }}">
                            {{ $reg->status === 'approved' ? 'Disetujui' : ($reg->status === 'rejected' ? 'Ditolak' : 'Pending') }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            @if($reg->status === 'pending')
                                <a href="{{ route('admin.registrations.approve', $reg) }}" class="btn-icon" style="color: #155724; border-color: #155724;" title="Setujui"><i class="fas fa-check"></i></a>
                                <a href="{{ route('admin.registrations.reject', $reg) }}" class="btn-icon danger" title="Tolak"><i class="fas fa-times"></i></a>
                            @endif
                            <a href="{{ route('admin.registrations.show', $reg) }}" class="btn-icon" title="Detail"><i class="fas fa-eye"></i></a>
                            <form method="POST" action="{{ route('admin.registrations.destroy', $reg) }}" style="display:inline;" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon danger" title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" style="text-align: center; padding: 40px; color: var(--text-muted);">Belum ada data pendaftaran.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
