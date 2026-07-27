@extends('layouts.app')

@section('title', 'Berita - ' . App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))

@section('content')
<section class="page-hero">
    <div class="hero-pattern-overlay" aria-hidden="true"></div>
    <div class="hero-dots" aria-hidden="true">
        <span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="container">
        <span class="calli-mark">اقرأ</span>
        <div class="page-kicker">Berita &amp; Kegiatan</div>
        <h1>Berita</h1>
        <p class="page-desc">Informasi dan kegiatan terbaru dari {{ App\Models\Setting::getValue('site_name', 'Yayasan Azzahir') }}</p>
    </div>
</section>

<section style="padding: 80px 0;">
    <div class="container">
        <div class="news-list-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 40px;">
            <div>
                <div class="eyebrow">Berita &amp; Kegiatan</div>
                <h2 style="font-size: 1.6rem;">Semua Berita</h2>
            </div>
            <div class="news-filter" style="display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="{{ route('news.index') }}" class="tab-btn {{ !$category ? 'active' : '' }}">Semua</a>
                <a href="{{ route('news.index', ['category' => 'kegiatan']) }}" class="tab-btn {{ $category === 'kegiatan' ? 'active' : '' }}">Kegiatan</a>
                <a href="{{ route('news.index', ['category' => 'pengumuman']) }}" class="tab-btn {{ $category === 'pengumuman' ? 'active' : '' }}">Pengumuman</a>
                <a href="{{ route('news.index', ['category' => 'artikel']) }}" class="tab-btn {{ $category === 'artikel' ? 'active' : '' }}">Artikel</a>
            </div>
        </div>

        @if($newsList->isNotEmpty())
        <div class="news-grid">
            @foreach($newsList as $item)
            <article class="news-card reveal">
                <div class="news-thumb">
                    @if($item->featured_image)
                        <img src="{{ asset('storage/image/' . $item->featured_image) }}" alt="{{ $item->title }}">
                    @else
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--gold-lighter), var(--primary-bg)); display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-newspaper" style="font-size: 3rem; color: var(--gold); opacity: 0.5;"></i>
                        </div>
                    @endif
                </div>
                <div class="news-body">
                    <span class="news-date">{{ $item->published_at ? $item->published_at->format('d F Y') : '' }}</span>
                    <h3><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></h3>
                    <p>{{ Str::limit($item->excerpt ?: strip_tags($item->content), 150) }}</p>
                    <a href="{{ route('news.show', $item->slug) }}" class="btn btn-dark btn-sm" style="margin-top: 12px;">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="pagination">
            {{ $newsList->appends(request()->query())->links() }}
        </div>
        @else
        <div style="text-align: center; padding: 80px 20px;">
            <i class="fa-solid fa-newspaper" style="font-size: 3rem; color: var(--gold); margin-bottom: 16px;"></i>
            <h3>Belum Ada Berita</h3>
            <p style="color: var(--ink-muted);">Belum ada berita yang dipublikasikan saat ini.</p>
        </div>
        @endif
    </div>
</section>
@endsection
