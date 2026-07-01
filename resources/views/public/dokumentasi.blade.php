@extends('public.layouts.app')

@section('title','Dokumentasi Kegiatan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dokumentasiweb.css') }}">
@endsection

@section('content')

{{-- ============================
     HERO — lurus, tanpa kurva
============================= --}}

<section
    class="dok-hero"
    style="
        background:
        linear-gradient(rgba(7,26,65,.82), rgba(11,46,99,.72)),
        url('{{ !empty($profil->banner_dokumentasi)
                ? asset('uploads/profil/'.$profil->banner_dokumentasi)
                : asset('images/kantor-kelurahan.jpg') }}')
        center center / cover no-repeat;
        ">
    <div class="container">

        <nav class="dok-breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span>Dokumentasi Kegiatan</span>
        </nav>

        <div class="dok-hero-content">
            <h1>Galeri Dokumentasi</h1>
            <p>
                Dokumentasi berbagai kegiatan, pelayanan, pembangunan,<br>
                serta aktivitas masyarakat di Kelurahan
                {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}.
            </p>
        </div>

    </div>

</section>

{{-- ============================
     GALERI SECTION
============================= --}}

<section class="dok-galeri-section">

    <div class="container">

        @if($galeri->count())

            <div class="dok-section-header">
                <div>
                    <h2>Dokumentasi Terbaru</h2>
                    <p>Berikut adalah dokumentasi kegiatan terbaru di Kelurahan {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}.</p>
                </div>
            </div>

            <div class="dok-grid">

                @foreach($galeri as $item)

                <article class="dok-card">

                    <div class="dok-card-img">

                        <img
                            src="{{ asset('uploads/galeri/'.$item->foto) }}"
                            alt="{{ $item->judul }}"
                            loading="lazy">

                        <div class="dok-card-date-overlay">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal_kegiatan ?? $item->created_at)->format('d M Y') }}
                        </div>

                    </div>

                    <div class="dok-card-body">

                        <h3>{{ $item->judul }}</h3>

                        @if($item->keterangan)
                        <p class="dok-card-desc">
                            {{ \Illuminate\Support\Str::limit($item->keterangan, 90) }}
                        </p>
                        @endif

                        <a href="#" class="dok-lihat-detail">
                            Lihat Detail <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </article>

                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="dok-pagination-wrap">
                {{ $galeri->links('vendor.pagination.custom') }}
            </div>

        @else

            {{-- EMPTY STATE --}}
            <div class="dok-empty">

                <div class="dok-empty-icon">
                    <i class="bi bi-card-image"></i>
                </div>

                <div class="dok-empty-body">
                    <h3>Belum Ada Dokumentasi?</h3>
                    <p>
                        Dokumentasi kegiatan akan muncul di sini setelah
                        administrator mengunggah foto kegiatan terbaru.
                    </p>
                </div>

                <a href="{{ route('home') }}" class="dok-empty-btn">
                    <i class="bi bi-house-door-fill"></i>
                    Kembali ke Beranda
                </a>

            </div>

        @endif

    </div>

</section>

@endsection