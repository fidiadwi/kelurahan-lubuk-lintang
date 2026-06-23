@extends('public.layouts.app')

@section('title','Kontak & Aspirasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/kontakweb.css') }}">
@endsection

@section('content')

<section class="kontak-hero">

    <div class="container">

        <span class="hero-badge">
            HUBUNGI KAMI
        </span>

        <h1>
            Bantuan & Layanan
            Pengaduan Masyarakat
        </h1>

        <p>
            Kami siap menerima aspirasi, kritik,
            saran dan pengaduan masyarakat
            Kelurahan Lubuk Lintang.
        </p>

    </div>

</section>

<section class="kontak-info">

    <div class="container">

        <div class="kontak-grid">

            <div class="info-card">

                <h3>Informasi Kantor</h3>

                <div class="info-item">

                    <i class="bi bi-geo-alt-fill"></i>

                    <div>

                        <strong>Alamat</strong>

                        <p>
                            {{ $profil->alamat ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="info-item">

                    <i class="bi bi-telephone-fill"></i>

                    <div>

                        <strong>Telepon</strong>

                        <p>
                            {{ $profil->telepon ?? '-' }}
                        </p>

                    </div>

                </div>

                <div class="info-item">

                    <i class="bi bi-envelope-fill"></i>

                    <div>

                        <strong>Email</strong>

                        <p>
                            {{ $profil->email ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

            <div class="map-card">

                @if($profil->maps_embed)

                    {!! $profil->maps_embed !!}

                @else

                    <div class="map-kosong">

                        Maps belum tersedia

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>

<section class="aspirasi-section">

    <div class="container">

        @if(session('success'))

            <div class="success-alert">

                {{ session('success') }}

            </div>

        @endif

        <div class="aspirasi-card">

            <div class="aspirasi-left">

                <h2>
                    Tinggalkan Pesan
                </h2>

                <p>
                    Silakan isi formulir berikut
                    untuk menyampaikan aspirasi,
                    kritik dan saran kepada
                    pemerintah kelurahan.
                </p>

            </div>

            <div class="aspirasi-right">

                <form
                    action="{{ route('kirim.aspirasi') }}"
                    method="POST">

                    @csrf

                    <div class="form-row">

                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input
                                type="text"
                                name="nama"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Nomor HP</label>

                            <input
                                type="text"
                                name="no_hp"
                                required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Subjek</label>

                        <input
                            type="text"
                            name="subjek"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Pesan</label>

                        <textarea
                            name="pesan"
                            rows="6"
                            required></textarea>

                    </div>

                    <button
                        type="submit"
                        class="btn-kirim">

                        Kirim Aspirasi

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection