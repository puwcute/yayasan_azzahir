@extends('layouts.app')

@section('title', $article->title . ' - ' . App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))

@section('content')
<section class="page-hero">
    <div class="hero-pattern-overlay" aria-hidden="true"></div>
    <div class="hero-dots" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container" style="text-align: center; max-width: 800px;">
        <span class="calli-mark">اقرأ</span>
        <div class="page-kicker">Berita</div>
        <h1>{{ $article->title }}</h1>
        <div class="page-desc" style="display: flex; gap: 8px 20px; flex-wrap: wrap; justify-content: center; align-items: center;">
            <span><i class="far fa-calendar-alt"></i> {{ $article->published_at ? $article->published_at->format('d F Y') : '' }}</span>
            <span style="opacity: 0.5;">·</span>
            <span><i class="fa-regular fa-user"></i> {{ $article->author->full_name ?? 'Admin' }}</span>
            <span style="opacity: 0.5;">·</span>
            <span><i class="fa-solid fa-tag"></i> {{ ucfirst($article->category) }}</span>
        </div>
    </div>
</section>

<section style="padding: 80px 0;">
    <div class="container" style="max-width: 800px;">
        @if($article->featured_image)
        <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-lg); margin-bottom: 40px;">
            <img src="{{ asset('storage/image/' . $article->featured_image) }}" alt="{{ $article->title }}" style="width: 100%; height: 400px; object-fit: cover;">
        </div>
        @endif

        <div style="line-height: 2; font-size: 1.05rem; color: var(--ink-soft);">
            {{ nl2br($article->content) }}
        </div>

        <div style="margin-top: 48px; padding-top: 24px; border-top: 1px solid var(--border); display: flex; gap: 12px; flex-wrap: wrap;">
            <a href="{{ route('news.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
            </a>
        </div>
    </div>
</section>
@endsection
