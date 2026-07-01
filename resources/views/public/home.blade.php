@extends('public.layouts.app')

@section('title','Beranda')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/public.css') }}">
@endsection

@section('content')

{{-- ============================
     HERO SECTION
============================= --}}

<section class="hero">

    <div
        class="hero-inner"
        style="
            background:
            linear-gradient(rgba(7,26,65,.78), rgba(11,46,99,.72)),
            url('{{ !empty($profil->banner_beranda)
                    ? asset('uploads/profil/'.$profil->banner_beranda)
                    : asset('images/kantor-kelurahan.jpg') }}')
            center center / cover no-repeat;
        ">

        <div class="container">

            <div class="hero-content">

                <span class="hero-badge">
                    <i class="bi bi-shield-check-fill"></i>
                    Website Resmi {{ $profil->nama_kelurahan }}
                </span>

              <h1>
                    Kelurahan <br>
                    <span class="hero-highlight">
                        {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}
                    </span>
                </h1>

               <p>
                    Selamat datang di website resmi
                    {{ $profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang' }}.
                    Media informasi, pelayanan publik, serta komunikasi masyarakat secara cepat,
                    transparan dan terpercaya.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('profil') }}" class="btn-hero-primary">
                        Profil Kelurahan <i class="bi bi-chevron-right"></i>
                    </a>
                    <a href="{{ route('kontak') }}" class="btn-hero-secondary">
                        Hubungi Kami <i class="bi bi-chevron-right"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>

    {{-- Stats Bar --}}
    <div class="hero-stats-bar">
        <div class="container">
            <div class="hero-stats-grid">

                <div class="hero-stat-item">
                    <div class="stat-icon" style="background:#EEF2FF;">
                        <i class="bi bi-people-fill" style="color:#4F46E5;"></i>
                    </div>
                    <div class="stat-body">
                        <strong>{{ $totalPerangkat }}</strong>
                        <span>Perangkat Kelurahan</span>
                    </div>
                </div>

                <div class="hero-stat-item">
                    <div class="stat-icon" style="background:#ECFDF5;">
                        <i class="bi bi-images" style="color:#059669;"></i>
                    </div>
                    <div class="stat-body">
                        <strong>{{ $totalGaleri }}</strong>
                        <span>Dokumentasi<br>Kegiatan</span>
                    </div>
                </div>

                <div class="hero-stat-item">
                    <div class="stat-icon" style="background:#FFFBEB;">
                        <i class="bi bi-people" style="color:#D97706;"></i>
                    </div>
                    <div class="stat-body">
                        <strong>{{ $profil->jumlah_rt_rw ?? '-' }}</strong>
                        <span>RT / RW<br>Aktif</span>
                    </div>
                </div>

                <div class="hero-stat-item">
                    <div class="stat-icon" style="background:#F5F3FF;">
                        <i class="bi bi-clock-fill" style="color:#7C3AED;"></i>
                    </div>
                    <div class="stat-body">
                        <strong>{{ $profil->jumlah_penduduk ?? '-' }}</strong>
                        <span>Jumlah<br>Penduduk</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

{{-- ============================
     HALAMAN UTAMA (MENU CARDS)
============================= --}}

<section class="layanan-section">
    <div class="container">

        <div class="section-title">
            <h2>Halaman Utama</h2>
            <p>Akses cepat ke halaman informasi penting</p>
        </div>

        <div class="layanan-grid">

            <a href="{{ route('home') }}" class="layanan-card">
                <div class="layanan-icon" style="background:#EEF2FF;">
                    <i class="bi bi-house-door-fill" style="color:#2563EB;"></i>
                </div>
                <h4>Beranda</h4>
                <p>Informasi utama dan berita terbaru kelurahan.</p>
                <span class="layanan-link">Kunjungi <i class="bi bi-chevron-right"></i></span>
            </a>

            <a href="{{ route('profil') }}" class="layanan-card">
                <div class="layanan-icon" style="background:#EEF2FF;">
                    <i class="bi bi-person-fill" style="color:#2563EB;"></i>
                </div>
                <h4>Profil</h4>
                <p>Sejarah, visi misi, dan potensi Kelurahan.</p>
                <span class="layanan-link">Kunjungi <i class="bi bi-chevron-right"></i></span>
            </a>

            <a href="{{ route('perangkat') }}" class="layanan-card">
                <div class="layanan-icon" style="background:#ECFDF5;">
                    <i class="bi bi-diagram-3-fill" style="color:#059669;"></i>
                </div>
                <h4>Pemerintah</h4>
                <p>Informasi perangkat desa dan struktur organisasi.</p>
                <span class="layanan-link">Kunjungi <i class="bi bi-chevron-right"></i></span>
            </a>

            <a href="{{ route('dokumentasi') }}" class="layanan-card">
                <div class="layanan-icon" style="background:#FFFBEB;">
                    <i class="bi bi-images" style="color:#D97706;"></i>
                </div>
                <h4>Dokumentasi<br>Kegiatan</h4>
                <p>Galeri kegiatan dan program kelurahan.</p>
                <span class="layanan-link">Kunjungi <i class="bi bi-chevron-right"></i></span>
            </a>

            <a href="{{ route('kontak') }}" class="layanan-card">
                <div class="layanan-icon" style="background:#F5F3FF;">
                    <i class="bi bi-envelope-fill" style="color:#7C3AED;"></i>
                </div>
                <h4>Kontak</h4>
                <p>Sampaikan aspirasi dan pesan kepada kami.</p>
                <span class="layanan-link">Kunjungi <i class="bi bi-chevron-right"></i></span>
            </a>

        </div>

    </div>
</section>

{{-- ============================
     SAMBUTAN LURAH
============================= --}}

<section class="sambutan-section">
    <div class="container">

        <div class="sambutan-card">

            <div class="sambutan-photo">
                <img
                    src="{{ $profil->foto_kantor
                        ? asset('uploads/profil/'.$profil->foto_kantor)
                        : asset('images/default-office.jpg') }}"
                    alt="{{ $profil->nama_kelurahan }}">
            </div>

            <div class="sambutan-content">

                <span class="sambutan-eyebrow">SAMBUTAN LURAH</span>

                <h2>
                    Selamat Datang di Website Resmi <br>
                    {{ $profil->nama_kelurahan }}
                </h2>

                <p>
                    Kami berkomitmen untuk memberikan pelayanan terbaik, informasi yang transparan,
                    dan komunikasi yang terbuka bagi seluruh masyarakat. Melalui website ini, kami
                    berharap dapat mempercepat akses informasi dan layanan untuk mewujudkan
                    Kelurahan Lubuk Lintang yang maju, mandiri, dan sejahtera.
                </p>

                <div class="lurah-profile">
                    <img
                        src="{{ $lurah && $lurah->foto
                            ? asset('uploads/perangkat/'.$lurah->foto)
                            : asset('images/default-user.png') }}"
                        class="lurah-avatar"
                        alt="{{ $lurah->nama ?? 'Lurah' }}">
                    <div>
                        <strong>{{ $lurah->nama ?? '-' }}</strong>
                        <span>{{ $lurah->jabatan ?? 'Lurah' }}</span>
                    </div>

                </div>

                <a href="{{ route('profil') }}" class="btn-selengkapnya">
                    Selengkapnya <i class="bi bi-chevron-right"></i>
                </a>

            </div>

            <div class="sambutan-quote-deco">&#10078;</div>

        </div>

    </div>
</section>

{{-- ============================
     DOKUMENTASI KEGIATAN
============================= --}}

<section class="berita-section">
    <div class="container">

        <div class="berita-header">
            <h2>Dokumentasi Kegiatan</h2>
            <a href="{{ route('dokumentasi') }}" class="btn-lihat-semua">
                Lihat Semua Dokumentasi <i class="bi bi-chevron-right"></i>
            </a>
        </div>

        <div class="berita-layout">

            <div class="berita-cards">

                @forelse($galeri as $item)

                <div class="berita-card">

                    <div class="berita-card-img">

                        <img
                            src="{{ asset('uploads/galeri/'.$item->foto) }}"
                            alt="{{ $item->judul }}">

                        <span class="berita-badge">
                            Dokumentasi
                        </span>

                    </div>

                    <div class="berita-card-body">

                        <span class="berita-date">

                            <i class="bi bi-calendar3"></i>

                            {{ $item->tanggal_kegiatan
                                ? \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y')
                                : $item->created_at->format('d M Y') }}

                        </span>

                        <h4>{{ $item->judul }}</h4>

                        @if($item->keterangan)

                            <p>{{ Str::limit($item->keterangan,70) }}</p>

                        @endif

                    </div>

                </div>

                @empty

    <p>Belum ada dokumentasi kegiatan.</p>

    @endforelse

</div>

            <aside class="berita-sidebar">
                <div class="sidebar-info-card">

                    <div class="sidebar-info-item">
                        <i class="bi bi-clock-fill" style="color:#2563EB;"></i>
                        <div>
                            <strong>Jam Pelayanan</strong>
                            <span>08.00 - 16.00 WIB</span>
                        </div>
                    </div>

                    <div class="sidebar-divider"></div>

                    <p class="sidebar-kontak-label"><strong>Kontak Kami</strong></p>

                    <div class="sidebar-kontak-list">

                        <div class="sidebar-kontak-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>{{ $profil->telepon }}</span>
                        </div>

                        <div class="sidebar-kontak-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>{{ $profil->email }}</span>
                        </div>

                       <div class="sidebar-kontak-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>{{ $profil->alamat }}</span>
                        </div>

                    </div>

                </div>
            </aside>

        </div>

    </div>
</section>

@endsection