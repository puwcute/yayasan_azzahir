@extends('layouts.admin')

@section('title', 'Saran Masuk')

@section('content')
<div class="admin-header">
    <div>
        <h1>Saran Masuk</h1>
        <p style="color: var(--text-muted);">{{ $messages->count() }} saran total</p>
    </div>
</div>

<div class="admin-card" style="overflow: visible;">
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr><th>Kategori</th><th>Pengirim</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr style="{{ !$msg->is_read ? 'font-weight: 600;' : '' }}">
                    <td><span class="badge badge-success">{{ $msg->category ?: 'Umum' }}</span></td>
                    <td>
                        @if($msg->name || $msg->email)
                            {{ $msg->name ?: 'Anonim' }}
                            @if($msg->email)<br><small style="color: var(--text-muted);">{{ $msg->email }}</small>@endif
                            @if($msg->phone)<br><small style="color: var(--text-muted);"><i class="fas fa-phone"></i> {{ $msg->phone }}</small>@endif
                        @else
                            <span style="color: var(--text-muted); font-style: italic;">Anonim</span>
                        @endif
                    </td>
                    <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
                    <td>
                        @if($msg->replied_at)
                            <span class="badge badge-success">Dibalas</span>
                            <small style="display:block; font-size:0.72rem; color:var(--text-muted);">{{ $msg->replied_at->format('d M H:i') }}</small>
                        @elseif($msg->is_read)
                            <span class="badge badge-success">Dibaca</span>
                        @else
                            <span class="badge badge-warning">Baru</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons" style="display:flex; gap:6px; align-items:center;">
                            @if(!$msg->is_read)
                                <a href="{{ route('admin.messages.read', $msg) }}" class="btn-icon" title="Tandai Dibaca"><i class="fas fa-envelope-open"></i></a>
                            @endif
                            <button type="button" class="btn-icon" onclick="showMessage({{ $msg->id }})" title="Lihat Saran"><i class="fas fa-eye"></i></button>
                            <button type="button" class="btn-icon" style="color:var(--gold-dark);" onclick="showReplyForm({{ $msg->id }})" title="Balas"><i class="fas fa-reply"></i></button>
                            <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" style="display:inline;" onsubmit="return confirm('Hapus saran ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon danger" title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Pesan Detail (hidden by default, toggled by showMessage) -->
                <tr id="msg-detail-{{ $msg->id }}" style="display:none;">
                    <td colspan="5" style="background: var(--bg-section); padding: 0;">
                        <div style="padding: 20px 24px; border-bottom: 1px solid var(--border);">
                            <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:12px;">
                                <div>
                                    <strong style="font-size:1rem;">[{{ $msg->category ?: 'Umum' }}] Saran & Masukan</strong>
                                    <p style="font-size:0.85rem; color:var(--text-muted); margin-top:4px;">
                                        @if($msg->name || $msg->email)
                                            Dari <strong>{{ $msg->name ?: 'Anonim' }}</strong>
                                            @if($msg->email) &lt;{{ $msg->email }}&gt; @endif
                                            @if($msg->phone) · <i class="fas fa-phone"></i> {{ $msg->phone }} @endif
                                            ·
                                        @endif
                                        {{ $msg->created_at->format('d M Y H:i') }}
                                    </p>
                                </div>
                                <button type="button" onclick="hideMessage({{ $msg->id }})" style="background:none; border:none; font-size:1.2rem; cursor:pointer; color:var(--text-muted);">&times;</button>
                            </div>
                            <div style="padding:16px; background:var(--bg-card); border-radius:var(--radius-sm); border:1px solid var(--border); line-height:1.8; white-space:pre-wrap;">{{ $msg->message }}</div>
                        </div>

                        @if($msg->reply_body)
                        <div style="padding: 16px 24px 20px; background: var(--primary-bg);">
                            <p style="font-size:0.82rem; color:var(--primary); font-weight:600; margin-bottom:8px;">
                                <i class="fas fa-reply"></i> Balasan Anda ({{ $msg->replied_at ? $msg->replied_at->format('d M H:i') : '' }})
                            </p>
                            <div style="padding:12px 16px; background:var(--bg-card); border-radius:var(--radius-sm); border-left:3px solid var(--primary); line-height:1.7; white-space:pre-wrap;">{{ $msg->reply_body }}</div>
                        </div>
                        @endif
                    </td>
                </tr>

                <!-- Reply Form (hidden by default) -->
                <tr id="reply-form-{{ $msg->id }}" style="display:none;">
                    <td colspan="5" style="background: var(--bg-section); padding: 0;">
                        <form method="POST" action="{{ route('admin.messages.reply', $msg) }}" style="padding: 20px 24px;">
                            @csrf
                            <div style="margin-bottom:12px;">
                                <label style="font-weight:600; font-size:0.88rem; display:block; margin-bottom:6px;">
                                    <i class="fas fa-reply"></i> Balas Saran @if($msg->name || $msg->email)(ke <strong>{{ $msg->name ?: 'Anonim' }}</strong> @if($msg->email) &lt;{{ $msg->email }}&gt; @endif)@endif
                                </label>
                                <textarea name="reply_body" rows="5" class="form-control" placeholder="Tulis balasan Anda di sini..." required>{{ old('reply_body', $msg->reply_body) }}</textarea>
                            </div>
                            <div style="display:flex; gap:10px;">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> Kirim Balasan</button>
                                <button type="button" class="btn btn-sm" style="background:var(--border); color:var(--ink-soft);" onclick="hideReplyForm({{ $msg->id }})">Batal</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">Belum ada saran masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
.btn-icon {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-sm);
    border: 1px solid var(--border);
    background: var(--bg-card);
    color: var(--ink-soft);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.85rem;
    text-decoration: none;
}
.btn-icon:hover {
    background: var(--primary-bg);
    border-color: var(--primary-light);
    color: var(--primary);
    transform: translateY(-1px);
}
.btn-icon.danger:hover {
    background: #fce4ec;
    border-color: #ef9a9a;
    color: #c62828;
}
</style>
@endpush

@push('scripts')
<script>
function showMessage(id) {
    const row = document.getElementById('msg-detail-' + id);
    const isVisible = row.style.display !== 'none';
    document.querySelectorAll('[id^="msg-detail-"]').forEach(r => r.style.display = 'none');
    document.querySelectorAll('[id^="reply-form-"]').forEach(r => r.style.display = 'none');
    if (!isVisible) row.style.display = 'table-row';
}

function hideMessage(id) {
    document.getElementById('msg-detail-' + id).style.display = 'none';
}

function showReplyForm(id) {
    const row = document.getElementById('reply-form-' + id);
    const isVisible = row.style.display !== 'none';
    document.querySelectorAll('[id^="reply-form-"]').forEach(r => r.style.display = 'none');
    document.querySelectorAll('[id^="msg-detail-"]').forEach(r => r.style.display = 'none');
    if (!isVisible) row.style.display = 'table-row';
}

function hideReplyForm(id) {
    document.getElementById('reply-form-' + id).style.display = 'none';
}
</script>
@endpush
