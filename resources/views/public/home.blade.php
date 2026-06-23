@extends('public.layouts.app')

@section('title','Beranda')

@section('content')

<section class="hero">

    <div class="container">

    <div class="hero-content">

        <span class="hero-badge">
            Website Resmi Kelurahan
        </span>

        <h1>
            {{ $profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang' }}
        </h1>

        <p>
            Mewujudkan pelayanan publik yang cepat,
            transparan, dan responsif bagi seluruh masyarakat.
        </p>

        <div class="hero-buttons">

            <a href="{{ route('profil') }}"
               class="btn-primary">

                Profil Kelurahan

            </a>

            <a href="{{ route('kontak') }}"
               class="btn-secondary">

                Hubungi Kami

            </a>

        </div>

        <div class="hero-stats">

            <div class="hero-stat">

                <h3>{{ $totalPerangkat }}</h3>

                <span>Perangkat</span>

            </div>

            <div class="hero-stat">

                <h3>{{ $totalGaleri }}</h3>

                <span>Dokumentasi</span>

            </div>

            <div class="hero-stat">

                <h3>{{ $profil->tahun_berdiri ?? '-' }}</h3>

                <span>Tahun Berdiri</span>

            </div>

        </div>

    </div>

</div>

</section>

<section class="menu-utama">

    <div class="container">

        <div class="section-title">

            <span>LAYANAN INFORMASI</span>

            <h2>
                Menu Utama Website
            </h2>

        </div>

        <div class="menu-grid">

            <a href="{{ route('profil') }}"
               class="menu-card">

                <i class="bi bi-building"></i>

                <h3>Profil Kelurahan</h3>

                <p>
                    Sejarah, visi misi dan informasi umum kelurahan.
                </p>

            </a>

            <a href="{{ route('perangkat') }}"
               class="menu-card">

                <i class="bi bi-people"></i>

                <h3>Perangkat Kelurahan</h3>

                <p>
                    Data lengkap aparatur kelurahan.
                </p>

            </a>

            <a href="{{ route('dokumentasi') }}"
               class="menu-card">

                <i class="bi bi-images"></i>

                <h3>Dokumentasi Kegiatan</h3>

                <p>
                    Galeri kegiatan dan program kelurahan.
                </p>

            </a>

        </div>

    </div>

</section>

<section class="sambutan">

    <div class="container">

        <div class="sambutan-card">

            <div class="sambutan-photo">

                <i class="bi bi-person-circle"></i>

            </div>

            <div class="sambutan-content">

                <span>
                    SAMBUTAN LURAH
                </span>

                <h2>
                    Selamat Datang
                </h2>

                <p>

                    Selamat datang di Website Resmi
                    Kelurahan Lubuk Lintang.

                    Website ini hadir sebagai sarana
                    informasi, komunikasi serta pelayanan
                    publik yang mudah diakses oleh masyarakat.

                </p>

            </div>

        </div>

    </div>

</section>

<section class="galeri-preview">

    <div class="container">

        <div class="section-title">

            <span>DOKUMENTASI TERBARU</span>

            <h2>
                Kegiatan Kelurahan
            </h2>

        </div>

        <div class="galeri-grid">

            @foreach($galeri as $item)

            <div class="galeri-card">

                <img
                    src="{{ asset('uploads/galeri/'.$item->foto) }}"
                    alt="{{ $item->judul }}">

                <div class="galeri-overlay">

                    <h4>
                        {{ $item->judul }}
                    </h4>

                </div>

            </div>

            @endforeach

        </div>

        <div class="text-center">

            <a href="{{ route('dokumentasi') }}"
               class="btn-outline">

                Lihat Semua Dokumentasi

            </a>

        </div>

    </div>

</section>

@endsection