@extends('layouts.admin')

@section('title', 'Detail Pendaftaran')

@section('content')
<div class="admin-header">
    <div>
        <h1>Detail Pendaftaran</h1>
        <p>No. {{ $registration->registration_number }}</p>
    </div>
    <a href="{{ route('admin.registrations.index') }}" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="admin-card">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div><strong>No. Pendaftaran:</strong><br>{{ $registration->registration_number }}</div>
        <div><strong>Status:</strong><br>
            <span class="badge badge-{{ $registration->status === 'approved' ? 'success' : ($registration->status === 'rejected' ? 'danger' : 'warning') }}">
                {{ $registration->status === 'approved' ? 'Disetujui' : ($registration->status === 'rejected' ? 'Ditolak' : 'Pending') }}
            </span>
        </div>
        <div><strong>Nama Lengkap:</strong><br>{{ $registration->full_name }}</div>
        <div><strong>Tempat/Tgl Lahir:</strong><br>{{ $registration->place_of_birth ?: '-' }}, {{ $registration->date_of_birth ? $registration->date_of_birth->format('d F Y') : '-' }}</div>
        <div><strong>Jenis Kelamin:</strong><br>{{ $registration->gender ?: '-' }}</div>
        <div><strong>Program:</strong><br>{{ $registration->program }}</div>
        <div><strong>Telepon:</strong><br>{{ $registration->phone ?: '-' }}</div>
        <div><strong>Email:</strong><br>{{ $registration->email ?: '-' }}</div>
        <div><strong>Nama Orang Tua:</strong><br>{{ $registration->parent_name ?: '-' }}</div>
        <div><strong>Telepon Orang Tua:</strong><br>{{ $registration->parent_phone ?: '-' }}</div>
        <div style="grid-column: 1 / -1;"><strong>Alamat:</strong><br>{{ nl2br($registration->address ?: '-') }}</div>
        <div style="grid-column: 1 / -1;"><strong>Tanggal Daftar:</strong><br>{{ $registration->created_at->format('d F Y H:i') }}</div>
    </div>

    @if($registration->status === 'pending')
    <div style="margin-top: 24px; display: flex; gap: 12px;">
        <a href="{{ route('admin.registrations.approve', $registration) }}" class="btn btn-sm btn-primary">Setujui</a>
        <a href="{{ route('admin.registrations.reject', $registration) }}" class="btn btn-sm btn-outline" style="color: #dc3545; border-color: #dc3545;">Tolak</a>
    </div>
    @endif
</div>
@endsection
