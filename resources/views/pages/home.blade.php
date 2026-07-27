@extends('layouts.app')

@section('title', 'Beranda - ' . App\Models\Setting::getValue('site_name', 'Yayasan Azzahir Mojosari'))

@section('content')
<!-- ===== HERO ===== -->
<section class="hero" id="home">
    <div class="hero-pattern-overlay" aria-hidden="true"></div>

    <div class="hero-particles" aria-hidden="true">
        <svg class="hero-star" viewBox="0 0 24 24" fill="#C89B3C"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#E9D6A6"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#C89B3C"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#BF8628"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#E9D6A6"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#C89B3C"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#BF8628"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
        <svg class="hero-star" viewBox="0 0 24 24" fill="#E9D6A6"><path d="M12 2L13.5 9.5L21 12L13.5 14.5L12 22L10.5 14.5L3 12L10.5 9.5Z"/></svg>
    </div>

    <div class="container hero-grid">
        <div class="hero-copy">
            <span class="calli-mark">طلب العلم فريضة</span>
            <div class="hero-kicker">
                <span class="dot"></span> Pendidikan Islam Terpadu
            </div>
            <h1>
                <span class="line"><span>Menumbuhkan <em>Adab</em>,</span></span>
                <span class="line"><span>Mengasah Ilmu,</span></span>
                <span class="line"><span>Merawat Peradaban</span></span>
            </h1>
            <p class="hero-lead">
                Yayasan Azzahir Mojosari memadukan kedalaman kepesantrenan klasik dengan kesiapan sains
                dan teknologi masa kini — dari jenjang Raudhatul Athfal hingga Madrasah Tsanawiyah,
                di bawah satu atap yang sama.
            </p>

            <div class="hero-cta">
                <a href="{{ route('registration') }}" class="btn btn-primary">
                    <i class="fa-solid fa-paper-plane"></i> Mulai Pendaftaran
                </a>
                <a href="{{ route('profile') }}" class="btn btn-outline">
                    <i class="fa-solid fa-book-quran"></i> Lihat Program
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-num" data-count="{{ $yearsActive ?? 5 }}">0</div>
                    <div class="stat-label">Tahun Berkiprah</div>
                </div>
                <div class="stat">
                    <div class="stat-num" data-count="{{ $santriCount ?? 400 }}">0</div>
                    <div class="stat-label">Santri Aktif</div>
                </div>
                <div class="stat">
                    <div class="stat-num" data-count="4">0</div>
                    <div class="stat-label">Jenjang Terpadu</div>
                </div>
                <div class="stat">
                    <div class="stat-num" data-count="{{ $teacherCount ?? 30 }}">0</div>
                    <div class="stat-label">Tenaga Pengajar</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-card">
                @php $heroImg = App\Models\Setting::getValue('hero_image', ''); @endphp
                <div class="hero-card-bg" @if($heroImg) style="background-image: url('{{ asset('storage/image/' . $heroImg) }}'); background-size: cover; background-position: center;" @else style="background: linear-gradient(135deg, var(--gold-lighter), var(--primary-bg)); display: flex; align-items: center; justify-content: center;" @endif>
                    @if(!$heroImg)
                        <i class="fa-solid fa-mosque" style="font-size: 8rem; color: var(--gold); opacity: 0.4;"></i>
                    @endif
                </div>
                <div class="hero-card-overlay"></div>
                <div class="hero-card-content">
                    <span class="hero-card-badge">Tentang Kami</span>
                    <h3>Menara Ilmu &amp; Adab</h3>
                    <p>
                        Tahfidz, kitab turats, bahasa aktif, dan literasi digital dirangkai dalam satu
                        asuhan yang hangat dan disiplin — membentuk santri yang percaya diri di dua dunia.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== PATTERN STRIP ===== -->
<div class="pattern-strip">
    <div class="track"></div>
</div>

<!-- ===== TENTANG ===== -->
<section id="tentang" style="background: var(--bg-alt); padding: 100px 0;">
    <div class="container about-grid">
        <div class="about-visual reveal">
            <div class="about-frame jenjang-frame-photo">
                @php $aboutImg = App\Models\Setting::getValue('about_image', ''); @endphp
                @if($aboutImg)
                    <img src="{{ asset('storage/image/' . $aboutImg) }}" alt="Tentang Yayasan Azzahir" style="width: 100%; height: 100%; min-height: 400px; object-fit: cover;" onerror="this.style.display='none'">
                @else
                    <div style="width: 100%; height: 100%; min-height: 400px; background: linear-gradient(135deg, var(--gold-lighter), var(--primary-bg)); display: flex; align-items: center; justify-content: center; flex-direction: column; padding: 40px;">
                        <i class="fa-solid fa-landmark" style="font-size: 5rem; color: var(--gold); margin-bottom: 16px;"></i>
                        <span style="font-family: var(--font-arabic); font-size: 24px; color: var(--primary);">العلم نور</span>
                    </div>
                @endif
                <div class="quote-chip">
                    "Ilmu tanpa adab bagaikan pelita tanpa sumbu." — Prinsip Asuh Azzahir
                </div>
            </div>
        </div>

        <div class="about-body reveal">
            <span class="calli-mark" style="font-size: 28px;">العلم نور</span>
            <div class="eyebrow">Profil Yayasan</div>
            <h2 style="margin-bottom: 20px;">Satu Yayasan, Empat Jenjang, Satu Visi Adab</h2>
            <p>{{ nl2br(App\Models\Setting::getValue('about_text', 'Yayasan Azzahir Mojosari mengelola satuan pendidikan berjenjang — RA, MI, MTS — beserta Pondok Pesantren Modern yang menaunginya. Pendidikan formal dipadukan dengan pembiasaan ibadah, kajian kitab turats, dan penguasaan bahasa asing aktif.')) }}</p>
            <p>Santri tidak hanya ditempa dari sisi kitab, tetapi juga dibekali keterampilan komputer, robotik dasar, dan literasi digital — agar siap menjawab tantangan zaman tanpa kehilangan akar keislaman.</p>

            <div class="about-pillars">
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-book-quran"></i></div>
                    <div>
                        <h4>Tahfidz Al-Qur'an</h4>
                        <p>Target hafalan bertahap tiap jenjang</p>
                    </div>
                </div>
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-language"></i></div>
                    <div>
                        <h4>Bahasa Aktif</h4>
                        <p>Kelas intensif Arab &amp; Inggris</p>
                    </div>
                </div>
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-scroll"></i></div>
                    <div>
                        <h4>Kitab Turats</h4>
                        <p>Kajian Fiqih, Aqidah, Nahwu-Shorof</p>
                    </div>
                </div>
                <div class="pillar-mini">
                    <div class="ico"><i class="fa-solid fa-microchip"></i></div>
                    <div>
                        <h4>Teknologi &amp; Robotik</h4>
                        <p>Ekstrakurikuler komputer terapan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== PROGRAM ===== -->
<section class="bg-alt" id="program">
    <div class="container">
        <div class="ornament-divider">
            <span class="line"></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M12 2L13.8 9.5L21 12L13.8 14.5L12 22L10.2 14.5L3 12L10.2 9.5Z"/>
            </svg>
            <span class="line right"></span>
        </div>
        <div class="section-head center reveal">
            <div class="eyebrow">Satuan Jenjang Pendidikan</div>
            <h2>Program yang Tumbuh Bersama Usia Santri</h2>
            <p>Pendidikan terintegrasi nilai kepesantrenan, dirancang berjenjang dari usia dini hingga remaja.</p>
        </div>

        <div class="program-grid">
            <div class="program-card reveal">
                <span class="num">JENJANG 01</span>
                <div class="ico"><i class="fa-solid fa-child" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>RA Azzahir</h3>
                <p><strong style="color: var(--primary)">Sejak 2022</strong> &bull; Raudhatul Athfal — pembentukan karakter islami dan motorik anak lewat suasana bermain yang hangat.</p>
                <a href="{{ route('profile') }}" class="learn">Info selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="program-card reveal">
                <span class="num">JENJANG 02</span>
                <div class="ico"><i class="fa-solid fa-school" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>MI Azzahir</h3>
                <p><strong style="color: var(--primary)">Sejak 2023</strong> &bull; Madrasah Ibtidaiyah — dasar sains berpadu metode cepat baca Al-Qur'an dan pembiasaan ibadah harian.</p>
                <a href="{{ route('profile') }}" class="learn">Info selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="program-card reveal">
                <span class="num">JENJANG 03</span>
                <div class="ico"><i class="fa-solid fa-graduation-cap" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>MTS Azzahir</h3>
                <p><strong style="color: var(--primary)">Sejak 2023</strong> &bull; Madrasah Tsanawiyah — kelas bilingual, target hafalan 5 juz, dan opsi berasrama bagi santri fokus.</p>
                <a href="{{ route('profile') }}" class="learn">Info selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="program-card reveal">
                <span class="num">JENJANG 04</span>
                <div class="ico"><i class="fa-solid fa-building-columns" style="font-size: 2.5rem; color: var(--gold-dark);"></i></div>
                <h3>Pondok Pesantren</h3>
                <p><strong style="color: var(--primary)">Sejak 2022</strong> &bull; Sistem klasikal modern — kajian kitab turats, tahfidz, dan bahasa aktif dalam asuhan penuh 24 jam.</p>
                <a href="{{ route('profile') }}" class="learn">Info selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="impact reveal" style="margin-top: 64px;">
            <div class="impact-grid">
                <div class="impact-item">
                    <div class="num"><span data-count="{{ $santriCount ?? 400 }}">0</span>+</div>
                    <div class="label">Santri Aktif</div>
                </div>
                <div class="impact-item">
                    <div class="num"><span data-count="4">0</span></div>
                    <div class="label">Jenjang Terpadu</div>
                </div>
                <div class="impact-item">
                    <div class="num"><span data-count="{{ $teacherCount ?? 30 }}">0</span></div>
                    <div class="label">Tenaga Pengajar</div>
                </div>
                <div class="impact-item">
                    <div class="num"><span data-count="{{ $yearsActive ?? 5 }}">0</span>+</div>
                    <div class="label">Tahun Berkiprah</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== KEGIATAN ===== -->
<section class="bg-alt" id="kegiatan">
    <div class="container">
        <div class="ornament-divider">
            <span class="line"></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M12 2L13.8 9.5L21 12L13.8 14.5L12 22L10.2 14.5L3 12L10.2 9.5Z"/>
            </svg>
            <span class="line right"></span>
        </div>
        <div class="section-head center reveal">
            <div class="eyebrow">Kegiatan &amp; Program</div>
            <h2>Pembiasaan, Program &amp; Ekstrakurikuler Terpadu</h2>
            <p>Setiap jenjang memiliki aktivitas unggulan yang dirancang untuk membentuk karakter, keterampilan, dan kecintaan terhadap ilmu.</p>
        </div>

        <!-- ===== TAB NAVIGATION ===== -->
        <div class="curriculum-nav reveal">
            <button class="tab-btn active" data-tab="tab-ra"><i class="fa-solid fa-child"></i> <span>RA</span></button>
            <button class="tab-btn" data-tab="tab-mi"><i class="fa-solid fa-school"></i> <span>MI</span></button>
            <button class="tab-btn" data-tab="tab-mts"><i class="fa-solid fa-graduation-cap"></i> <span>MTs</span></button>
        </div>

        <!-- ================================================================
         TAB 1 - RAUDHATUL ATHFAL (RA)
         ================================================================ -->
        <div class="tab-panel active" id="tab-ra">
            <div class="jenjang-subhead reveal">
                <div class="badge"><i class="fa-solid fa-child"></i></div>
                <div>
                    <h3>RA Azzahir — Kegiatan &amp; Pembiasaan</h3>
                    <p>Raudhatul Athfal (usia 4-6 tahun) — pembentukan karakter islami melalui pembiasaan, bermain, dan eksplorasi.</p>
                </div>
            </div>

            <!-- Pembiasaan RA -->
            <div class="section-label reveal"><span>Pembiasaan Harian</span><span class="line"></span></div>

            <div class="schedule-block reveal">
                <h4><i class="fa-solid fa-clock"></i> Rutinitas Pagi RA</h4>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="tl-time">07.15 - 07.30 WIB</div>
                        <div class="tl-title">Apel Pagi <span style="font-weight: 400; color: var(--ink-muted);">— Aula Bersama Kelas A &amp; B</span></div>
                        <div class="tl-desc">
                            Diawali dengan doa bersama: Surah Al-Fatihah, doa dimudahkan segala urusan, doa akan belajar, doa Qotmil Qur'an, dan Asmaul Husna.
                            Dilanjutkan bernyanyi bersama, mengenal huruf, angka, huruf hijaiyah, dan lagu anak-anak.
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="tl-time">07.30 - 08.00 WIB</div>
                        <div class="tl-title">Wudhu &amp; Sholat Dhuha</div>
                        <div class="tl-desc">
                            Ananda belajar wudhu dengan tertib dan membaca niat wudhu. Setelah itu melaksanakan Sholat Dhuha:
                            <ul>
                                <li><strong>Senin:</strong> Berjamaah di aula bersama Kelas A dan B</li>
                                <li><strong>Selasa - Kamis:</strong> Berjamaah di kelas masing-masing</li>
                            </ul>
                            Urutan sholat: membaca niat, doa iftitah, Surah Al-Fatihah, dan Surah Ad-Dhuha.
                            Setelah sholat membaca istigfar, Al-Fatihah, Ayat Kursi, doa kedua orang tua, dan doa kebaikan dunia akhirat.
                            Dilanjutkan murojaah surat, doa, dan hadis, bersholawat, dan bersalaman.
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="tl-time">08.00 - 08.15 WIB</div>
                        <div class="tl-title">Muroja'ah Surat Pendek, Hadis &amp; Doa</div>
                        <div class="tl-desc">
                            Agar ananda hafal surat pendek, doa, dan hadis sehari-hari.
                            <ul>
                                <li><strong>Kelas A:</strong> Surah Al-Fatihah hingga Surah Al-Lahab</li>
                                <li><strong>Kelas B:</strong> Surah Al-Fatihah hingga Surah Al-Ma'un</li>
                            </ul>
                            <strong>Hadis:</strong> berkata yang baik, menutup aurat, senyum, jangan marah, larangan makan &amp; minum sambil berdiri, sholat, berbuat baik.<br>
                            <strong>Doa:</strong> mau makan, sesudah makan, mau tidur, bangun tidur, keluar rumah, naik kendaraan, niat wudhu, kedua orang tua, kebaikan dunia akhirat, dimudahkan segala urusan.
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="tl-time">08.15 - 08.30 WIB</div>
                        <div class="tl-title">Pengenalan Huruf &amp; Membaca</div>
                        <div class="tl-desc">
                            Pembiasaan sebelum kegiatan inti agar anak masih fresh dan daya ingat cepat menangkap.
                            Kelas A dikenalkan huruf dan angka. Kelas B lebih ke membaca dua suku kata.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Program RA -->
            <div class="section-label reveal"><span>Program Unggulan</span><span class="line"></span></div>
            <div class="program-highlight-grid">
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-kaaba"></i></div>
                        <span class="freq">Setahun sekali</span>
                    </div>
                    <div class="ph-body">
                        <h4>Manasik Haji</h4>
                        <p>Mengenalkan ananda pada rukun Islam ke-5 yakni ibadah haji. Kegiatan dilakukan bersama sekolah lain, memberikan pengalaman langsung tentang tata cara pelaksanaan haji secara sederhana.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-kitchen-set"></i></div>
                        <span class="freq">1 semester 1 kali</span>
                    </div>
                    <div class="ph-body">
                        <h4>Fun Cooking</h4>
                        <p>Melatih ananda bekerja sama dengan teman dan mengenalkan makanan khas suatu daerah. Seperti membuat Bolu Kojo — ananda diajari dan praktek langsung membuatnya sesuai arahan bunda guru.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-bus"></i></div>
                        <span class="freq">1 tahun sekali</span>
                    </div>
                    <div class="ph-body">
                        <h4>Kunjungan Edukatif</h4>
                        <p>Mengenalkan macam-macam profesi untuk membangun cita-cita ananda. Kunjungan ke Pemadam Kebakaran dan Brimob — ananda diperkenalkan alat dan fungsinya, serta antusias mencoba berbagai alat.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-tree"></i></div>
                        <span class="freq">1 tahun sekali</span>
                    </div>
                    <div class="ph-body">
                        <h4>Outing Class</h4>
                        <p>Merubah suasana belajar ananda — belajar tidak hanya di kelas tetapi juga di luar untuk mengeksplor lingkungan. Seperti ke Taman Madu, ananda mengeksplor, melihat, mencoba madu, dan memanen madu langsung dari sarangnya.</p>
                    </div>
                </div>
            </div>

            <!-- Ekskul RA -->
            <div class="section-label reveal"><span>Ekstrakurikuler</span><span class="line"></span></div>
            <div class="ekskul-grid">
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-music"></i></div>
                    <div class="info">
                        <h5>Menari</h5>
                        <div class="meta">Jumat · 10.00-11.00</div>
                        <p>Melatih gerak dan lagu ananda, memahami tarian daerah serta budaya Indonesia.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-palette"></i></div>
                    <div class="info">
                        <h5>Mewarnai</h5>
                        <div class="meta">Jumat · 10.00-11.00</div>
                        <p>Melatih skill ananda dalam memadukan warna, koordinasi motorik halus, dan kreativitas.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-book-quran"></i></div>
                    <div class="info">
                        <h5>Hafalan Surat</h5>
                        <div class="meta">Jumat · 10.00-11.00</div>
                        <p>Melatih hafalan ananda dengan makhroj dan tajwid yang benar.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================================================================
         TAB 2 - MADRASAH IBTIDAIYAH (MI)
         ================================================================ -->
        <div class="tab-panel" id="tab-mi">
            <div class="jenjang-subhead reveal">
                <div class="badge"><i class="fa-solid fa-school"></i></div>
                <div>
                    <h3>MI Azzahir — Kegiatan &amp; Pembiasaan</h3>
                    <p>Madrasah Ibtidaiyah (setingkat SD) — perpaduan sains dasar, Al-Qur'an, dan pembiasaan ibadah harian.</p>
                </div>
            </div>

            <!-- Pembiasaan MI -->
            <div class="section-label reveal"><span>Pembiasaan Harian</span><span class="line"></span></div>

            <div class="schedule-block reveal">
                <h4><i class="fa-solid fa-clock"></i> Rutinitas Pagi MI</h4>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="tl-time">Senin–Jumat · 07.15–07.40 WIB</div>
                        <div class="tl-title">Wudhu &amp; Sholat Dhuha Berjamaah</div>
                        <div class="tl-desc">Kegiatan diawali dengan berwudhu secara tertib dan mandiri, kemudian Sholat Dhuha berjamaah. Melalui kegiatan ini, peserta didik dibimbing membiasakan diri menjaga kesucian, meningkatkan kedisiplinan, serta menanamkan kecintaan terhadap ibadah sunnah sejak usia dini dengan pendampingan dan pembinaan guru.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="tl-time">Sabtu · 07.00–07.30 WIB</div>
                        <div class="tl-title">Istighotsah</div>
                        <div class="tl-desc">Seluruh warga madrasah mengikuti pembacaan doa-doa, dzikir, shalawat, serta munajat bersama kepada Allah SWT. Menanamkan nilai spiritual, memperkuat keimanan, membangun ketenangan jiwa, serta membiasakan peserta didik untuk selalu memohon pertolongan dan berserah diri kepada Allah. Kegiatan ini juga mempererat ukhuwah Islamiyah.</div>
                    </div>
                </div>
            </div>

            <!-- Kegiatan Pembelajaran MI -->
            <div class="section-label reveal"><span>Kegiatan Pembelajaran</span><span class="line"></span></div>

            <div class="activity-grid">
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                        <div>
                            <h4>KBM (Kegiatan Belajar Mengajar)</h4>
                            <span class="time">Senin–Sabtu · 07.40–12.15 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>KBM dilaksanakan secara terstruktur, aktif, dan menyenangkan dengan mengintegrasikan aspek pengetahuan, keterampilan, karakter, serta nilai-nilai keislaman. Guru menerapkan metode inovatif dan berpusat pada peserta didik, mengembangkan kemampuan akademik sekaligus membentuk karakter kreatif, mandiri, dan berpikir kritis.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-person-running"></i></div>
                        <div>
                            <h4>Senam Pagi</h4>
                            <span class="time">Jumat · 07.00–07.40 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Rutin meningkatkan kebugaran jasmani, menjaga kesehatan tubuh, serta menumbuhkan semangat belajar. Dilakukan bersama-sama dengan gerakan menyenangkan dan sesuai usia anak, membangun kekompakan, disiplin, serta menciptakan suasana belajar yang lebih segar.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-flask"></i></div>
                        <div>
                            <h4>Kokurikuler</h4>
                            <span class="time">Jumat · 09.15–10.15 WIB · 2x/bulan</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Penguatan pembelajaran melalui praktik, proyek, diskusi, eksperimen, dan aktivitas kolaboratif. Memberikan kesempatan kepada peserta didik mengembangkan berpikir kritis, kreativitas, komunikasi, dan kerja sama sehingga pembelajaran bersifat aplikatif dan kontekstual.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-computer"></i></div>
                        <div>
                            <h4>Praktik Komputer</h4>
                            <span class="time">Jumat · 09.15–10.15 WIB · 2x/bulan</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Membekali peserta didik dengan keterampilan dasar teknologi informasi. Dikenalkan pada penggunaan perangkat komputer, pengoperasian aplikasi perkantoran, mengetik, pengelolaan dokumen sederhana, serta pemanfaatan teknologi secara bijak dan bertanggung jawab.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-campground"></i></div>
                        <div>
                            <h4>Pramuka</h4>
                            <span class="time">Sabtu · 07.30–08.30 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Wadah pembentukan karakter melalui aktivitas menyenangkan, edukatif, dan menantang. Peserta didik dilatih memiliki jiwa kepemimpinan, kemandirian, kedisiplinan, tanggung jawab, kerja sama, serta kepedulian terhadap sesama dan lingkungan.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-book-quran"></i></div>
                        <div>
                            <h4>Diniyah</h4>
                            <span class="time">Kelas IV · Senin, Kamis, Sabtu · 30 menit sebelum pulang</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Pembelajaran keagamaan tambahan fokus pada penguatan pemahaman agama Islam. Meliputi baca tulis Al-Qur'an, akidah, akhlak, ibadah, doa-doa harian, serta dasar-dasar ilmu agama lainnya.</p>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler MI -->
            <div class="section-label reveal"><span>Ekstrakurikuler</span><span class="line"></span></div>
            <p style="color: var(--ink-muted); margin-bottom: 16px; font-size: 0.9rem;">Dilaksanakan setiap hari Sabtu pukul 08.50–09.50 WIB</p>
            <div class="ekskul-grid">
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-microphone"></i></div>
                    <div class="info">
                        <h5>Da'i Cilik</h5>
                        <p>Membina kemampuan peserta didik dalam menyampaikan dakwah Islam secara komunikatif, percaya diri, serta santun.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-comment-dots"></i></div>
                    <div class="info">
                        <h5>Pidato (Indonesia &amp; Inggris)</h5>
                        <p>Melatih kemampuan berbicara di depan umum, menyusun naskah pidato, mengatur intonasi, ekspresi, dan bahasa tubuh.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-book-open-reader"></i></div>
                    <div class="info">
                        <h5>Dongeng</h5>
                        <p>Mengembangkan kemampuan bercerita secara menarik, kreatif, dan edukatif. Melatih imajinasi dan keberanian tampil di depan audiens.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-music"></i></div>
                    <div class="info">
                        <h5>Tari</h5>
                        <p>Mengembangkan bakat seni tari melalui pembelajaran gerak, irama, ekspresi, dan kekompakan. Menumbuhkan rasa percaya diri serta kecintaan terhadap seni dan budaya Indonesia.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-masks-theater"></i></div>
                    <div class="info">
                        <h5>Pantomim</h5>
                        <p>Melatih kemampuan berekspresi melalui gerakan tubuh dan mimik tanpa menggunakan dialog. Mengembangkan kreativitas, konsentrasi, dan koordinasi tubuh.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-palette"></i></div>
                    <div class="info">
                        <h5>Mewarnai</h5>
                        <p>Sarana mengembangkan kreativitas, ketelitian, koordinasi motorik halus, serta kemampuan memadukan warna dalam suasana yang menyenangkan.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-futbol"></i></div>
                    <div class="info">
                        <h5>Futsal</h5>
                        <p>Membina kemampuan olahraga sekaligus menanamkan nilai sportivitas, kerja sama tim, disiplin, dan tanggung jawab melalui latihan rutin.</p>
                    </div>
                </div>
            </div>

            <!-- Program MI -->
            <div class="section-label reveal"><span>Program Unggulan</span><span class="line"></span></div>
            <div class="program-highlight-grid">
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-kitchen-set"></i></div>
                        <span class="freq">1 kali per semester</span>
                    </div>
                    <div class="ph-body">
                        <h4>Fun Cooking</h4>
                        <p>Pembelajaran berbasis praktik yang memberikan pengalaman langsung kepada peserta didik dalam mengolah makanan sederhana secara aman, sehat, dan menyenangkan. Melatih kreativitas, kemandirian, kerja sama, dan tanggung jawab.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-bus"></i></div>
                        <span class="freq">1 kali per tahun</span>
                    </div>
                    <div class="ph-body">
                        <h4>Kunjungan Edukatif</h4>
                        <p>Pembelajaran di luar kelas yang bertujuan memperluas wawasan melalui pengalaman belajar secara langsung di berbagai tempat edukatif, seperti instansi pemerintahan, tempat bersejarah, rumah industri, maupun lokasi edukasi lainnya.</p>
                    </div>
                </div>
            </div>

            <!-- Prestasi MI -->
            <div class="section-label reveal"><span>Prestasi</span><span class="line"></span></div>
            <div class="achievement-grid">
                <div class="achievement-card reveal">
                    <div class="trophy"><i class="fa-solid fa-trophy"></i></div>
                    <div class="ac-info">
                        <h4>Juara III Lomba Tari Kreasi</h4>
                        <div class="ac-event">Pentas Seni — Perjusami se-KKM MIN 02 OKU Timur</div>
                        <p class="ac-desc">Prestasi ini merupakan bukti komitmen madrasah dalam mengembangkan potensi peserta didik tidak hanya pada bidang akademik, tetapi juga di bidang seni dan kreativitas. Menjadi motivasi untuk terus mencetak generasi yang berprestasi dan percaya diri.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================================================================
         TAB 3 - MADRASAH TSANAWIYAH (MTs)
         ================================================================ -->
        <div class="tab-panel" id="tab-mts">
            <div class="jenjang-subhead reveal">
                <div class="badge"><i class="fa-solid fa-graduation-cap"></i></div>
                <div>
                    <h3>MTS Azzahir — Kegiatan &amp; Pembiasaan</h3>
                    <p>Madrasah Tsanawiyah (setingkat SMP) — kelas bilingual, tahfidz, dan pengembangan karakter remaja Islami.</p>
                </div>
            </div>

            <!-- Pembiasaan MTs -->
            <div class="section-label reveal"><span>Pembiasaan Harian</span><span class="line"></span></div>

            <div class="schedule-block reveal">
                <h4><i class="fa-solid fa-clock"></i> Rutinitas Pagi MTs</h4>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="tl-time">Setiap hari · 07.15–07.30 WIB</div>
                        <div class="tl-title">Shalat Dhuha Berjamaah</div>
                        <div class="tl-desc">Dilaksanakan oleh seluruh peserta didik setiap pagi di mushola sekolah sebelum proses pembelajaran dimulai. Bertujuan menanamkan kebiasaan beribadah, meningkatkan kedisiplinan dalam menjalankan ibadah sunnah, serta membentuk karakter yang beriman, bertakwa, dan berakhlak mulia dengan pendampingan guru.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="tl-time">Setiap hari · 07.30–07.40 WIB</div>
                        <div class="tl-title">Muroja'ah Al-Qur'an</div>
                        <div class="tl-desc">Kegiatan mengulang dan membaca Al-Qur'an atau Juz Amma di masing-masing kelas dengan didampingi guru jam pertama. Guru dan peserta didik secara bergantian memimpin bacaan. Dalam satu pertemuan, ditargetkan satu surah (atau lebih untuk surah pendek). Bertujuan meningkatkan kemampuan membaca, memperkuat hafalan, dan menumbuhkan kecintaan terhadap Al-Qur'an.</div>
                    </div>
                </div>
            </div>

            <!-- Kegiatan Pembelajaran MTs -->
            <div class="section-label reveal"><span>Kegiatan Pembelajaran</span><span class="line"></span></div>

            <div class="activity-grid">
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                        <div>
                            <h4>KBM (Kegiatan Belajar Mengajar)</h4>
                            <span class="time">Senin–Sabtu · 07.40–14.00 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Pembelajaran utama sesuai kurikulum yang berlaku, tidak hanya di ruang kelas tetapi juga memanfaatkan halaman, perpustakaan, lab komputer, dan area lain. Guru menerapkan metode aktif, kreatif, inovatif, dan menyenangkan seperti diskusi, presentasi, demonstrasi, praktik, serta pembelajaran berbasis proyek dengan bantuan media teknologi.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-computer"></i></div>
                        <div>
                            <h4>Praktik Komputer</h4>
                            <span class="time">Selasa, Kamis, Jumat · 09.50–11.00 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Dilaksanakan di laboratorium komputer sekolah. Materi meliputi Microsoft Word (membuat dan mengedit dokumen, format teks, menyisipkan gambar/tabel, bagan, tata letak halaman) dan Microsoft Excel (memasukkan data, fungsi SUM, AVERAGE, MAX, MIN, serta penyajian data dalam tabel dan grafik sederhana).</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-book-quran"></i></div>
                        <div>
                            <h4>Kegiatan Diniyah</h4>
                            <span class="time">Senin, Selasa, Kamis · 14.00–14.30 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Program pendalaman ilmu agama Islam setelah KBM. Peserta didik laki-laki dan perempuan belajar secara terpisah untuk menciptakan suasana kondusif. Meliputi akidah, ibadah, akhlak, fikih, doa-doa harian, serta penerapan nilai-nilai Islam dalam kehidupan sehari-hari melalui ceramah, diskusi, tanya jawab, dan praktik ibadah.</p>
                    </div>
                </div>
                <div class="activity-card reveal">
                    <div class="activity-card-head">
                        <div class="icon"><i class="fa-solid fa-quran"></i></div>
                        <div>
                            <h4>Pembelajaran Tahsin</h4>
                            <span class="time">Senin, Rabu, Sabtu · 09.50–11.00 WIB</span>
                        </div>
                    </div>
                    <div class="activity-card-body">
                        <p>Fokus pada peningkatan kualitas bacaan Al-Qur'an peserta didik dengan bimbingan guru tahsin. Materi meliputi makharijul huruf, hukum tajwid, panjang pendek bacaan, sifat-sifat huruf, serta kelancaran membaca Al-Qur'an.</p>
                    </div>
                </div>
            </div>

            <!-- Program MTs -->
            <div class="section-label reveal"><span>Program Sekolah</span><span class="line"></span></div>
            <div class="program-highlight-grid">
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-kitchen-set"></i></div>
                        <span class="freq">1 kali per semester</span>
                    </div>
                    <div class="ph-body">
                        <h4>Fun Cooking</h4>
                        <p>Praktik memasak sederhana secara berkelompok di bawah bimbingan guru. Melatih life skill, kerja sama, kreativitas, tanggung jawab, dan kemandirian peserta didik.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-bus"></i></div>
                        <span class="freq">1 kali per tahun</span>
                    </div>
                    <div class="ph-body">
                        <h4>Kunjungan Edukatif</h4>
                        <p>Pembelajaran di luar kelas dengan mengunjungi tempat-tempat bernilai pendidikan. Memberikan pengalaman belajar secara langsung, memperluas wawasan, dan menghubungkan materi pembelajaran dengan kehidupan nyata.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-flask"></i></div>
                        <span class="freq">1 kali per semester</span>
                    </div>
                    <div class="ph-body">
                        <h4>Kokurikuler</h4>
                        <p>Mendukung pembelajaran intrakurikuler melalui aktivitas berbasis proyek, praktik, dan eksplorasi. Mengembangkan berpikir kritis, kreativitas, komunikasi, kolaborasi, serta keterampilan memecahkan masalah.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
                        <span class="freq">Setiap bulan Ramadan</span>
                    </div>
                    <div class="ph-body">
                        <h4>Berbagi di Bulan Ramadan</h4>
                        <p>Kegiatan sosial melibatkan seluruh peserta didik untuk menumbuhkan empati, kepedulian sosial, dan semangat berbagi. Dilakukan melalui pengumpulan dan penyaluran paket sembako serta berbagi makanan berbuka puasa.</p>
                    </div>
                </div>
                <div class="program-highlight-card reveal">
                    <div class="ph-top">
                        <div class="icon"><i class="fa-solid fa-broom"></i></div>
                        <span class="freq">2 kali per bulan</span>
                    </div>
                    <div class="ph-body">
                        <h4>Jumat Bersih</h4>
                        <p>Kegiatan gotong royong membersihkan ruang kelas, halaman sekolah, dan lingkungan sekitar. Menumbuhkan budaya hidup bersih, kepedulian terhadap lingkungan, dan tanggung jawab bersama.</p>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler MTs -->
            <div class="section-label reveal"><span>Ekstrakurikuler</span><span class="line"></span></div>
            <div class="ekskul-grid">
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-campground"></i></div>
                    <div class="info">
                        <h5>Pramuka</h5>
                        <div class="meta">Sabtu · 07.40–08.40 WIB</div>
                        <p>Latihan baris-berbaris, tali-temali, permainan edukatif, dan kegiatan kepemimpinan. Membentuk sikap disiplin, mandiri, bertanggung jawab, serta jiwa kepemimpinan dan kerja sama.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-music"></i></div>
                    <div class="info">
                        <h5>Tari</h5>
                        <div class="meta">Sabtu · 11.00–12.00 WIB</div>
                        <p>Wadah pengembangan bakat seni tari melalui latihan gerak dasar, teknik tari, penghayatan, dan kekompakan. Meningkatkan kreativitas, rasa percaya diri, dan kecintaan terhadap seni budaya Indonesia.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-drum"></i></div>
                    <div class="info">
                        <h5>Hadroh</h5>
                        <div class="meta">Minggu · 09.00–10.00 WIB</div>
                        <p>Seni musik Islami mengajarkan peserta didik memainkan alat musik rebana, melantunkan shalawat, serta menjaga kekompakan dalam kelompok. Mengembangkan bakat seni dan menumbuhkan kecintaan terhadap syiar Islam.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-volleyball"></i></div>
                    <div class="info">
                        <h5>Bola Voli</h5>
                        <div class="meta">Rabu · 14.00–15.00 WIB</div>
                        <p>Latihan teknik dasar meliputi servis, passing, smash, blocking, rotasi pemain, dan strategi permainan. Menumbuhkan sportivitas, disiplin, kerja sama tim, dan semangat berkompetisi secara sehat.</p>
                    </div>
                </div>
                <div class="ekskul-card reveal">
                    <div class="icon"><i class="fa-solid fa-futbol"></i></div>
                    <div class="info">
                        <h5>Sepak Bola</h5>
                        <div class="meta">Rabu · 15.00–17.00 WIB</div>
                        <p>Olahraga rutin untuk mengembangkan keterampilan bermain sepak bola, menjaga kebugaran tubuh, membangun disiplin, kerja sama tim, sportivitas, dan rasa percaya diri melalui latihan dan pertandingan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== GALERI ===== -->
<section class="bg-alt" id="galeri" style="padding: 100px 0;">
    <div class="container">
        <div class="section-head center reveal">
            <div class="eyebrow">Dokumentasi</div>
            <h2>Program Kegiatan Rutin</h2>
            <p>Ragam agenda yang berlangsung di lingkungan yayasan — dari kelas hingga panggung prestasi.</p>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item tall reveal" style="background: linear-gradient(160deg, var(--primary), var(--primary-light));">
                <div class="gallery-icon"><i class="fa-solid fa-book-quran"></i></div>
                <span>Tahfidz Pagi Bersama Santri</span>
            </div>
            <div class="gallery-item wide reveal" style="background: linear-gradient(160deg, var(--gold), var(--gold-light));">
                <div class="gallery-icon"><i class="fa-solid fa-mosque"></i></div>
                <span>Peringatan Hari Besar Islam (PHBI)</span>
            </div>
            <div class="gallery-item wide reveal" style="background: linear-gradient(160deg, var(--primary-light), var(--primary-lighter));">
                <div class="gallery-icon"><i class="fa-solid fa-microchip"></i></div>
                <span>Kegiatan Praktik Komputer</span>
            </div>
            <div class="gallery-item reveal" style="background: linear-gradient(160deg, var(--gold-dark), var(--gold));">
                <div class="gallery-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <span>Wisuda Tahfidz Juz Amma</span>
            </div>
            <div class="gallery-item wide reveal" style="background: linear-gradient(160deg, var(--primary), var(--gold-dark));">
                <div class="gallery-icon"><i class="fa-solid fa-scroll"></i></div>
                <span>Kajian Kitab Kuning</span>
            </div>
            <div class="gallery-item reveal" style="background: linear-gradient(160deg, var(--gold), var(--gold-lighter));">
                <div class="gallery-icon"><i class="fa-solid fa-compass"></i></div>
                <span>Studi Lapangan Edukatif</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== BERITA ===== -->
@if(isset($latestNews) && $latestNews->isNotEmpty())
<section class="bg-alt" id="berita" style="padding: 100px 0;">
    <div class="container">
        <div class="section-head reveal">
            <div class="eyebrow">Berita &amp; Kegiatan</div>
            <h2>Kilas Aktifitas Yayasan</h2>
        </div>

        <div class="news-grid">
            @foreach($latestNews as $item)
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
                    <p>{{ Str::limit($item->excerpt ?: strip_tags($item->content), 120) }}</p>
                </div>
            </article>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('news.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-newspaper"></i> Lihat Semua Berita
            </a>
        </div>
    </div>
</section>
@endif

<!-- ===== STRUKTUR PENGURUS ===== -->
<section class="bg-alt" id="struktur">
    <div class="container">
        <div class="ornament-divider">
            <span class="line"></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M12 2L13.8 9.5L21 12L13.8 14.5L12 22L10.2 14.5L3 12L10.2 9.5Z"/>
            </svg>
            <span class="line right"></span>
        </div>
        <div class="section-head center reveal">
            <div class="eyebrow">Pengurus &amp; Kepala Sekolah</div>
            <h2>Struktur Kepengurusan Yayasan</h2>
            <p>Dikelola oleh tim pengurus yayasan dan dipimpin oleh kepala satuan pendidikan yang berkompeten di bidangnya.</p>
        </div>

        <!-- Pengurus Yayasan -->
        <div class="section-label reveal" style="margin-top: 0;">
            <span>Pengurus Yayasan</span><span class="line"></span>
        </div>
        <div class="team-grid" style="grid-template-columns: repeat(3, 1fr);">
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-crown"></i></div>
                <h4>Drs. H. Misran</h4>
                <span class="team-role">Ketua Yayasan</span>
                <p class="team-desc">Penanggung jawab tertinggi dan pengarah kebijakan strategis yayasan.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-pen-fancy"></i></div>
                <h4>Muhammad Rifa'i</h4>
                <span class="team-role">Sekretaris</span>
                <p class="team-desc">Pengelola administrasi, dokumentasi, dan koordinasi internal yayasan.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-coins"></i></div>
                <h4>Beti Patmawati, A. Md.</h4>
                <span class="team-role">Bendahara</span>
                <p class="team-desc">Pengelola keuangan, pembukuan, dan laporan keuangan yayasan.</p>
            </div>
        </div>

        <!-- Kepala Satuan Pendidikan -->
        <div class="section-label reveal">
            <span>Kepala Satuan Pendidikan</span><span class="line"></span>
        </div>
        <div class="team-grid">
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-user-tie"></i></div>
                <h4>Muhammad Rifa'i</h4>
                <span class="team-role">Pengasuh Pondok Pesantren</span>
                <p class="team-desc">Membina arah kepesantrenan, kajian kitab, dan pembinaan santri berasrama.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4>Ninin Kurniawati, S. Pd., Gr.</h4>
                <span class="team-role">Kepala RA Azzahir</span>
                <p class="team-desc">Merancang kegiatan bermain-sambil-belajar untuk usia dini (4-6 tahun).</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4>Ria Lailiana, S. Pd.</h4>
                <span class="team-role">Kepala MI Azzahir</span>
                <p class="team-desc">Mengawal capaian sains dasar, tahfidz, dan pembiasaan ibadah harian.</p>
            </div>
            <div class="team-card reveal">
                <div class="team-avatar"><i class="fa-solid fa-chalkboard-user"></i></div>
                <h4>Yuni Purwanti, S. Pd.</h4>
                <span class="team-role">Kepala MTS Azzahir</span>
                <p class="team-desc">Memimpin kelas bilingual, program boarding, dan pengembangan kurikulum.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== FAQ ===== -->
<section id="faq">
    <div class="container">
        <div class="section-head center reveal">
            <div class="eyebrow">Pertanyaan Umum</div>
            <h2>Seputar Pendaftaran PPDB</h2>
        </div>

        <div class="faq-list reveal">
            <div class="faq-item open">
                <button class="faq-q" aria-expanded="true">
                    Kapan gelombang pendaftaran dibuka?
                    <span class="faq-icon">−</span>
                </button>
                <div class="faq-a">
                    <p>PPDB dibuka dalam tiga gelombang setiap tahun ajaran, dimulai bulan April. Kuota tiap jenjang terbatas dan berlaku sistem first-come-first-served.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" aria-expanded="false">
                    Apa saja berkas yang perlu disiapkan?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-a">
                    <div class="faq-detail">
                        <p class="faq-intro">Berkas yang perlu disiapkan berbeda untuk tiap jenjang. Berikut rinciannya:</p>

                        <div class="faq-jenjang">
                            <h4>1. Jenjang RA (Raudhatul Athfal / setingkat TK)</h4>
                            <p class="faq-sub-label">Persyaratan Usia</p>
                            <ul>
                                <li>Kelompok A: minimal 4 tahun.</li>
                                <li>Kelompok B: minimal 5 tahun.</li>
                            </ul>
                            <p class="faq-sub-label">Berkas Administrasi</p>
                            <ul>
                                <li>Fotokopi Akta Kelahiran anak (2-3 lembar).</li>
                                <li>Fotokopi Kartu Keluarga (KK).</li>
                                <li>Fotokopi KTP kedua orang tua/wali.</li>
                                <li>Pasfoto anak terbaru (ukuran 3x4 atau 4x6, latar merah/biru).</li>
                            </ul>
                        </div>

                        <div class="faq-jenjang">
                            <h4>2. Jenjang MI (Madrasah Ibtidaiyah / setingkat SD)</h4>
                            <p class="faq-sub-label">Persyaratan Usia</p>
                            <ul>
                                <li>Umumnya minimal 6-7 tahun pada awal tahun pelajaran baru.</li>
                                <li>Usia di bawah 6 tahun (minimal 5,5 tahun) dapat dipertimbangkan jika kuota tersedia dan disertai rekomendasi psikolog.</li>
                            </ul>
                            <p class="faq-sub-label">Berkas Administrasi</p>
                            <ul>
                                <li>Fotokopi Akta Kelahiran.</li>
                                <li>Fotokopi Kartu Keluarga (KK).</li>
                                <li>Fotokopi KTP orang tua/wali.</li>
                                <li>Fotokopi Ijazah RA/TK (jika ada).</li>
                                <li>Pasfoto terbaru calon siswa.</li>
                            </ul>
                        </div>

                        <div class="faq-jenjang">
                            <h4>3. Jenjang MTs (Madrasah Tsanawiyah / setingkat SMP)</h4>
                            <p class="faq-sub-label">Persyaratan Akademik</p>
                            <ul>
                                <li>Telah lulus dari MI atau SD.</li>
                            </ul>
                            <p class="faq-sub-label">Berkas Administrasi</p>
                            <ul>
                                <li>Fotokopi Ijazah SD/MI yang telah dilegalisir (atau SKL jika ijazah belum terbit).</li>
                                <li>Fotokopi SKHU/nilai rapor kelas terakhir.</li>
                                <li>Fotokopi Akta Kelahiran.</li>
                                <li>Fotokopi Kartu Keluarga (KK).</li>
                                <li>Fotokopi KTP orang tua/wali.</li>
                                <li>Pasfoto terbaru calon siswa.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" aria-expanded="false">
                    Apakah tersedia asrama untuk semua jenjang?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-a">
                    <p>Opsi berasrama tersedia untuk jenjang MTS dan Pondok Pesantren Mandiri. RA dan MI berjalan dengan sistem harian (non-boarding).</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-q" aria-expanded="false">
                    Apakah ada tes seleksi masuk? <span class="faq-icon">+</span>
                </button>
                <div class="faq-a">
                    <p>Untuk jenjang MTS dan Pesantren, calon santri mengikuti pemetaan kompetensi dan wawancara singkat bersama orang tua/wali.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA / KONTAK ===== -->
<section class="bg-alt" id="kontak" style="padding: 100px 0;">
    <div class="container">
        <div class="section-head center reveal">
            <div class="eyebrow">Mulai Langkah Pertama</div>
            <h2>Bergabunglah Bersama Kami</h2>
            <p>Daftarkan putra-putri Anda untuk bergabung dan mendapatkan pendidikan Islam terbaik.</p>
        </div>

        <div style="text-align: center;">
            <a href="{{ route('registration') }}" class="btn btn-dark btn-lg">
                <i class="fa-solid fa-paper-plane"></i> Daftar Sekarang
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline btn-lg" style="margin-left: 16px; border-color: var(--primary); color: var(--primary);">
                <i class="fa-solid fa-envelope"></i> Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
