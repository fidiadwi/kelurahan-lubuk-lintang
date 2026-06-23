@extends('public.layouts.app')

@section('title','Beranda')

@section('content')

<!-- HERO -->

<section class="hero">


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

        <a href="#tentang"
           class="btn-primary">

            Profil Kelurahan

        </a>

        <a href="#aspirasi"
           class="btn-secondary">

            Sampaikan Aspirasi

        </a>

    </div>

    <div class="hero-stats">

        <div class="hero-stat">

            <h3>
                {{ $totalPerangkat }}
            </h3>

            <span>
                Perangkat
            </span>

        </div>

        <div class="hero-stat">

            <h3>
                {{ $totalGaleri }}
            </h3>

            <span>
                Dokumentasi
            </span>

        </div>

        <div class="hero-stat">

            <h3>
                {{ $profil->tahun_berdiri ?? '-' }}
            </h3>

            <span>
                Tahun Berdiri
            </span>

        </div>

    </div>

</div>

</section>

<!-- TENTANG -->

<section
    id="tentang"
    class="tentang">

<div class="container">

    <div class="section-title">

        <span>
            TENTANG KELURAHAN
        </span>

        <h2>
            {{ $profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang' }}
        </h2>

    </div>

    <div class="about-grid">

        <div class="about-image">

            @if($profil && $profil->foto_kantor)

                <img
                    src="{{ asset('uploads/profil/'.$profil->foto_kantor) }}"
                    alt="Kantor Kelurahan">

            @else

                <img
                    src="{{ asset('images/kantor-kelurahan.jpg') }}"
                    alt="Kantor Kelurahan">

            @endif

        </div>

        <div class="about-content">

            <h3>
                Sejarah Singkat
            </h3>

            <p>

                {{ $profil->sejarah ?? 'Informasi sejarah kelurahan belum tersedia.' }}

            </p>

            <div class="info-list">

                <div>

                    <i class="bi bi-geo-alt-fill"></i>

                    <span>
                        {{ $profil->alamat ?? '-' }}
                    </span>

                </div>

                <div>

                    <i class="bi bi-telephone-fill"></i>

                    <span>
                        {{ $profil->telepon ?? '-' }}
                    </span>

                </div>

                <div>

                    <i class="bi bi-envelope-fill"></i>

                    <span>
                        {{ $profil->email ?? '-' }}
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>


</section>

<!-- SAMBUTAN -->

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
                Selamat Datang di Website Resmi
            </h2>

            <p>

                Selamat datang di Website Resmi
                Kelurahan Lubuk Lintang.

                Website ini hadir sebagai sarana
                informasi, komunikasi dan pelayanan
                kepada masyarakat secara terbuka,
                cepat dan mudah diakses.

            </p>

            <strong>
                Lurah Kelurahan Lubuk Lintang
            </strong>

        </div>

    </div>

</div>


</section>

<!-- PERANGKAT -->

<section
    id="perangkat"
    class="perangkat">


<div class="container">

    <div class="section-title">

        <span>
            PERANGKAT KELURAHAN
        </span>

        <h2>
            Aparatur Kelurahan
        </h2>

    </div>

    <div class="perangkat-grid">

        @forelse($perangkat as $item)

        <div class="perangkat-card">

            @if($item->foto)

                <img
                    src="{{ asset('uploads/perangkat/'.$item->foto) }}"
                    alt="{{ $item->nama }}">

            @else

                <div class="avatar-kosong">

                    <i class="bi bi-person"></i>

                </div>

            @endif

            <div class="perangkat-body">

                <h4>
                    {{ $item->nama }}
                </h4>

                <p>
                    {{ $item->jabatan }}
                </p>

            </div>

        </div>

        @empty

        <div class="empty-section">

            Data perangkat belum tersedia

        </div>

        @endforelse

    </div>

</div>


</section>

<!-- DOKUMENTASI -->

<section
    id="galeri"
    class="galeri">

    <div class="container">

        <div class="section-title">

            <span>
                DOKUMENTASI
            </span>

            <h2>
                Dokumentasi Kegiatan
            </h2>

            <p class="section-desc">

                Lihat berbagai kegiatan dan program
                yang telah kami laksanakan.

            </p>

        </div>

        <div class="galeri-grid">

            @forelse($galeri as $item)

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

            @empty

            <div class="empty-section">

                Belum ada dokumentasi kegiatan

            </div>

            @endforelse

        </div>

        <div class="galeri-button">

            <a href="#"
            class="btn-outline">

                <i class="bi bi-images"></i>

                Lihat Semua Dokumentasi

            </a>

        </div>

    </div>

</section>

<!-- KONTAK & ASPIRASI -->

<section
    id="aspirasi"
    class="kontak">

    <div class="container">

        <div class="section-title">

            <span>
                KONTAK & ASPIRASI
            </span>

            <h2>
                Hubungi Kami
            </h2>

            <p class="section-desc">

                Kami siap melayani dan mendengar
                aspirasi masyarakat.

            </p>

        </div>

        <div class="kontak-grid">

            <!-- INFO KONTAK -->

            <div class="kontak-info">

                <h3>
                    Informasi Kontak
                </h3>

                <div class="contact-item">

                    <i class="bi bi-geo-alt-fill"></i>

                    <div>

                        <strong>
                            Alamat
                        </strong>

                        <p>
                            {{ $profil->alamat ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="contact-item">

                    <i class="bi bi-telephone-fill"></i>

                    <div>

                        <strong>
                            Telepon
                        </strong>

                        <p>
                            {{ $profil->telepon ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="contact-item">

                    <i class="bi bi-envelope-fill"></i>

                    <div>

                        <strong>
                            Email
                        </strong>

                        <p>
                            {{ $profil->email ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="contact-item">

                    <i class="bi bi-clock-fill"></i>

                    <div>

                        <strong>
                            Jam Pelayanan
                        </strong>

                        <p>
                            Senin - Jumat
                            <br>
                            08.00 - 16.00 WIB
                        </p>

                    </div>

                </div>

            </div>

            <!-- FORM ASPIRASI -->

            <div class="kontak-form">

                <h3>
                    Form Aspirasi Masyarakat
                </h3>

                <p class="form-desc">

                    Silakan sampaikan kritik,
                    saran ataupun aspirasi Anda.

                </p>

                <form method="POST"
                    action="#">

                    @csrf

                    <div class="form-row">

                        <input
                            type="text"
                            name="nama"
                            placeholder="Nama Lengkap"
                            required>

                        <input
                            type="text"
                            name="no_hp"
                            placeholder="Nomor HP"
                            required>

                    </div>

                    <input
                        type="text"
                        name="subjek"
                        placeholder="Subjek"
                        required>

                    <textarea
                        name="pesan"
                        rows="5"
                        placeholder="Tulis aspirasi atau pesan..."
                        required></textarea>

                    <button
                        type="submit"
                        class="btn-kirim">

                        <i class="bi bi-send-fill"></i>

                        Kirim Aspirasi

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection
