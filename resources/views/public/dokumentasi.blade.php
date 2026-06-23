@extends('public.layouts.app')

@section('title','Dokumentasi Kegiatan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dokumentasiweb.css') }}">
@endsection

@section('content')

<section class="galeri-header">

    <div class="container">

        <h1>Galeri Dokumentasi</h1>

        <p>
            Arsip visual kegiatan dan dokumentasi
            Kelurahan
            {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}.
        </p>

    </div>

</section>

<section class="galeri-section">

    <div class="container">

        @if($galeri->count())

        <div class="galeri-grid">

            @foreach($galeri as $item)

            <div class="galeri-card">

                <img
                    src="{{ asset('uploads/galeri/'.$item->foto) }}"
                    alt="{{ $item->judul }}">

                <div class="galeri-content">

                    <span class="galeri-date">
                        <i class="bi bi-calendar-event"></i>
                        {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
                    </span>

                    <h3>
                        {{ $item->judul }}
                    </h3>

                    @if($item->keterangan)

                    <p>
                        {{ Str::limit($item->keterangan,100) }}
                    </p>

                    @endif

                </div>

            </div>

            @endforeach

        </div>

        <div class="pagination-wrapper">

            {{ $galeri->links() }}

        </div>

        @else

        <div class="empty-data">

            <i class="bi bi-images"></i>

            <h3>
                Belum Ada Dokumentasi
            </h3>

            <p>
                Data dokumentasi kegiatan belum tersedia.
            </p>

        </div>

        @endif

    </div>

</section>

@endsection