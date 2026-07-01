@extends('public.layouts.app')

@section('title','Profil Kelurahan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profilweb.css') }}">
@endsection

@section('content')

{{-- ============================
     PROFIL HEADER
============================= --}}

<section
    class="profil-header"
    style="
        background:
        linear-gradient(rgba(7,26,65,.80), rgba(11,46,99,.74)),
        url('{{ !empty($profil->banner_profil)
                ? asset('uploads/profil/'.$profil->banner_profil)
                : asset('images/kantor-kelurahan.jpg') }}')
        center center / cover no-repeat;
    ">

    <div class="container">

        <div class="profil-breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span>Profil</span>
        </div>

        <h1>
            Profil Kelurahan<br>
            <span class="profil-highlight">{{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}</span>
        </h1>

        <p>
            Mengenal lebih dekat identitas, sejarah, visi dan misi
            {{ $profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang' }}.
        </p>

    </div>

</section>

{{-- ============================
     SEJARAH + VISI MISI
============================= --}}

<section class="profil-content">

<div class="container">

    <div class="profil-grid">

        <!-- SEJARAH -->

        <div class="sejarah-card">

            <div class="profil-card-head">
                <div class="profil-card-icon" style="background:#EFF6FF;">
                    <i class="bi bi-book-fill" style="color:#2563EB;"></i>
                </div>
                <h2>Sejarah Kelurahan</h2>
            </div>

            <div class="sejarah-body">

                <div class="sejarah-text">

                    <p>
                        {{ $profil->sejarah ?? 'Data sejarah belum tersedia.' }}
                    </p>

                </div>

                @if($profil->foto_kantor)
                <div class="sejarah-photo">
                    <img
                        src="{{ asset('uploads/profil/'.$profil->foto_kantor) }}"
                        alt="Foto Kantor">
                </div>
                @endif

            </div>

        </div>

        <!-- VISI MISI -->

        <div class="visi-misi">

            <div class="visi-card">

                <div class="profil-card-head">
                    <div class="profil-card-icon" style="background:rgba(255,255,255,.15);">
                        <i class="bi bi-eye-fill" style="color:#60A5FA;"></i>
                    </div>
                    <h3>Visi</h3>
                </div>

                <p>
                    {{ $profil->visi ?? 'Data visi belum tersedia.' }}
                </p>

            </div>

            <div class="misi-card">

                <div class="profil-card-head">
                    <div class="profil-card-icon" style="background:#EFF6FF;">
                        <i class="bi bi-check2-square" style="color:#2563EB;"></i>
                    </div>
                    <h3>Misi</h3>
                </div>

                <ul class="misi-list">
                    @forelse(explode("\n", trim($profil->misi ?? '')) as $poin)
                        @if(trim($poin) !== '')
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>{{ trim($poin) }}</span>
                        </li>
                        @endif
                    @empty
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Data misi belum tersedia.</span>
                        </li>
                    @endforelse
                </ul>

            </div>

        </div>

    </div>

</div>

</section>

{{-- ============================
     STATISTIK
============================= --}}

<section class="profil-statistik">

    <div class="container">

        <div class="stat-grid">

            <div class="stat-card">
                <div class="stat-icon" style="background:#2563EB;">
                    <i class="bi bi-arrows-fullscreen"></i>
                </div>
                <div class="stat-text">
                    <span>Luas Wilayah</span>
                    <h3>{{ $profil->luas_wilayah ?? '-' }}</h3>
                    <small>Ha</small>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background:#059669;">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-text">
                    <span>Total Penduduk</span>
                    <h3>{{ $profil->jumlah_penduduk ?? '-' }}</h3>
                    <small>Jiwa</small>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background:#D97706;">
                    <i class="bi bi-building"></i>
                </div>
                <div class="stat-text">
                    <span>Jumlah RT / RW</span>
                    <h3>{{ $profil->jumlah_rt_rw ?? '-' }}</h3>
                    <small>RT / RW</small>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background:#7C3AED;">
                    <i class="bi bi-house-door-fill"></i>
                </div>
                <div class="stat-text">
                    <span>Jumlah KK</span>
                    <h3>{{ $profil->jumlah_kk ?? '-' }}</h3>
                    <small>KK</small>
                </div>
            </div>

        </div>

    </div>

</section>

{{-- ============================
     BATAS & LETAK WILAYAH
============================= --}}

<section class="wilayah-section">

    <div class="container">

        <div class="wilayah-card">

            <div class="wilayah-left">

                <div class="profil-card-head">
                    <div class="profil-card-icon" style="background:#EFF6FF;">
                        <i class="bi bi-geo-alt-fill" style="color:#2563EB;"></i>
                    </div>
                    <h2>Batas &amp; Letak Wilayah</h2>
                </div>

                <p>
                    Kelurahan {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}
                    merupakan wilayah administratif yang
                    berada di Kecamatan Seluma Selatan.
                </p>

                <ul class="batas-list">

                    <li>
                        <i class="bi bi-compass-fill" style="color:#2563EB;"></i>
                        <strong>Utara</strong>
                        <span>{{ $profil->batas_utara ?? '-' }}</span>
                    </li>

                    <li>
                        <i class="bi bi-caret-up-fill" style="color:#2563EB;"></i>
                        <strong>Selatan</strong>
                        <span>{{ $profil->batas_selatan ?? '-' }}</span>
                    </li>

                    <li>
                        <i class="bi bi-caret-up-fill" style="color:#2563EB;"></i>
                        <strong>Timur</strong>
                        <span>{{ $profil->batas_timur ?? '-' }}</span>
                    </li>

                    <li>
                        <i class="bi bi-caret-down-fill" style="color:#2563EB;"></i>
                        <strong>Barat</strong>
                        <span>{{ $profil->batas_barat ?? '-' }}</span>
                    </li>

                </ul>

            </div>

            <div class="wilayah-right">
                @if($profil->maps_embed)
                    <iframe
                        src="{{ $profil->maps_embed }}"
                        width="100%"
                        height="350"
                        style="border:0;border-radius:18px;"
                        loading="lazy">
                    </iframe>
                @else
                    <div class="map-placeholder">
                        <i class="bi bi-map"></i>
                        <span>Peta belum tersedia</span>
                    </div>
                @endif
            </div>

        </div>

    </div>

</section>

@endsection