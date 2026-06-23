@extends('public.layouts.app')

@section('title','Profil Kelurahan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profilweb.css') }}">
@endsection

@section('content')

<section class="profil-header">

    <div class="container">

        <h1>
            Profil Kelurahan
        </h1>

        <p>
            Mengenal lebih dekat identitas, sejarah, visi dan misi
            {{ $profil->nama_kelurahan }}.
        </p>

    </div>

</section>

<section class="profil-content">

<div class="container">

    <div class="profil-grid">

        <!-- SEJARAH -->

        <div class="sejarah-card">

            <h2>
                <i class="bi bi-book"></i>
                Sejarah Kelurahan
            </h2>

            <p>
                {{ $profil->sejarah ?? 'Data sejarah belum tersedia.' }}
            </p>

            @if($profil->foto_kantor)

            <img
                src="{{ asset('uploads/profil/'.$profil->foto_kantor) }}"
                alt="Foto Kantor">

            @endif

        </div>

        <!-- VISI MISI -->

        <div class="visi-misi">

            <div class="visi-card">

                <h3>
                    <i class="bi bi-eye"></i>
                    Visi
                </h3>

                <p>
                    {{ $profil->visi ?? '-' }}
                </p>

            </div>

            <div class="misi-card">

                <h3>
                    <i class="bi bi-check2-square"></i>
                    Misi
                </h3>

                <p>
                    {!! nl2br(e($profil->misi)) !!}
                </p>

            </div>

        </div>

    </div>

</div>

</section>

<section class="profil-statistik">

    <div class="container">

        <div class="stat-grid">

            <div class="stat-card">

                <i class="bi bi-calendar-event"></i>

                <span>Tahun Berdiri</span>

                <h3>
                    {{ $profil->tahun_berdiri ?? '-' }}
                </h3>

            </div>

            <div class="stat-card">

                <i class="bi bi-geo-alt"></i>

                <span>Alamat</span>

                <h3>
                    {{ $profil->alamat ?? '-' }}
                </h3>

            </div>

            <div class="stat-card">

                <i class="bi bi-telephone"></i>

                <span>Telepon</span>

                <h3>
                    {{ $profil->telepon ?? '-' }}
                </h3>

            </div>

            <div class="stat-card">

                <i class="bi bi-envelope"></i>

                <span>Email</span>

                <h3>
                    {{ $profil->email ?? '-' }}
                </h3>

            </div>

        </div>

    </div>

</section>

<section class="wilayah-section">

    <div class="container">

        <div class="wilayah-card">

            <div class="wilayah-left">

                <h2>
                    <i class="bi bi-map"></i>
                    Batas & Letak Wilayah
                </h2>

                <p>

                    Kelurahan {{ $profil->nama_kelurahan }}
                    merupakan wilayah administratif yang
                    berada di Kecamatan Seluma Selatan.

                </p>

                <table>

                    <tr>
                        <td>Utara</td>
                        <td>Kelurahan Tetangga</td>
                    </tr>

                    <tr>
                        <td>Selatan</td>
                        <td>Desa Tetangga</td>
                    </tr>

                    <tr>
                        <td>Timur</td>
                        <td>Sungai / Jalan</td>
                    </tr>

                    <tr>
                        <td>Barat</td>
                        <td>Perkebunan Warga</td>
                    </tr>

                </table>

            </div>

            <div class="wilayah-right">

                <iframe
                    src="https://maps.google.com/maps?q=kantor%20lurah%20lubuk%20lintang&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="350"
                    style="border:0;border-radius:18px;"
                    loading="lazy">
                </iframe>

            </div>

        </div>

    </div>

</section>

<section class="profil-info">

<div class="container">

    <div class="info-grid">

        <div class="info-card">

            <i class="bi bi-calendar-event"></i>

            <h4>Tahun Berdiri</h4>

            <h3>
                {{ $profil->tahun_berdiri ?? '-' }}
            </h3>

        </div>

        <div class="info-card">

            <i class="bi bi-geo-alt"></i>

            <h4>Alamat</h4>

            <h3>
                {{ $profil->alamat ?? '-' }}
            </h3>

        </div>

        <div class="info-card">

            <i class="bi bi-telephone"></i>

            <h4>Telepon</h4>

            <h3>
                {{ $profil->telepon ?? '-' }}
            </h3>

        </div>

        <div class="info-card">

            <i class="bi bi-envelope"></i>

            <h4>Email</h4>

            <h3>
                {{ $profil->email ?? '-' }}
            </h3>

        </div>

    </div>

</div>

</section>

@endsection