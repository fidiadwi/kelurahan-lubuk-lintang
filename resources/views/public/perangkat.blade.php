@extends('public.layouts.app')

@section('title','Perangkat Kelurahan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/perangkatweb.css') }}">
@endsection

@section('content')

<!-- HEADER -->

<section class="perangkat-header">

    <div class="container">

        <h1>
            Perangkat Kelurahan
        </h1>

        <p>
            Struktur organisasi dan aparatur
            {{ $profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang' }}
        </p>

    </div>

</section>

<!-- PIMPINAN -->

<section class="kepala-kelurahan">

    <div class="container">

        <div class="kepala-grid">

            <div class="kepala-foto">

                @if(isset($lurah) && $lurah && $lurah->foto)

                    <img
                        src="{{ asset('uploads/perangkat/'.$lurah->foto) }}"
                        alt="{{ $lurah->nama }}">

                @elseif($perangkat->count() && $perangkat->first()->foto)

                    <img
                        src="{{ asset('uploads/perangkat/'.$perangkat->first()->foto) }}"
                        alt="{{ $perangkat->first()->nama }}">

                @else

                    <div class="foto-kosong">

                        <i class="bi bi-person-fill"></i>

                    </div>

                @endif

            </div>

            <div class="kepala-info">

                <span class="badge-pimpinan">
                    Pimpinan Wilayah
                </span>

                <h2>

                    @if($perangkat->count())

                        {{ $perangkat->first()->nama }}

                    @else

                        Data Belum Tersedia

                    @endif

                </h2>

                <h4>

                    @if($perangkat->count())

                        {{ $perangkat->first()->jabatan }}

                    @else

                        Lurah

                    @endif

                </h4>

                <div class="garis"></div>

                <p>

                    Halaman ini memuat informasi perangkat
                    dan struktur organisasi
                    {{ $profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang' }}
                    sebagai bagian dari pelayanan publik
                    kepada masyarakat.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- STRUKTUR ORGANISASI -->

<section class="struktur-organisasi">

    <div class="container">

        <div class="section-title">

            <h2>
                Bagan Struktur Organisasi
            </h2>

            <p>
                Struktur koordinasi dan tanggung jawab
                pemerintahan kelurahan
            </p>

        </div>

        @if($perangkat->count())

        <div class="bagan-wrapper">

            <div class="bagan-lurah">

                <h4>

                    {{ $perangkat->first()->jabatan }}

                </h4>

                <span>

                    {{ $perangkat->first()->nama }}

                </span>

            </div>

            <div class="bagan-line"></div>

            <div class="bagan-bawah">

                @foreach($perangkat->skip(1)->take(3) as $item)

                    <div class="bagan-box">

                        <h5>

                            {{ $item->jabatan }}

                        </h5>

                        <span>

                            {{ $item->nama }}

                        </span>

                    </div>

                @endforeach

            </div>

        </div>

        @else

        <div class="empty-data">

            <i class="bi bi-diagram-3"></i>

            <h3>
                Struktur Belum Tersedia
            </h3>

        </div>

        @endif

    </div>

</section>

<!-- TABEL PERANGKAT -->

<section class="perangkat-table-section">

    <div class="container">

        <div class="table-header">

            <h2>
                Daftar Perangkat Kelurahan
            </h2>

            <span>
                Total:
                {{ $perangkat->count() }}
                Personel
            </span>

        </div>

        @if($perangkat->count())

        <div class="table-wrapper">

            <table class="perangkat-table">

                <thead>

                    <tr>

                        <th width="80">
                            No
                        </th>

                        <th width="120">
                            Foto
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Jabatan
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($perangkat as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            @if($item->foto)

                                <img
                                    src="{{ asset('uploads/perangkat/'.$item->foto) }}"
                                    alt="{{ $item->nama }}"
                                    class="table-foto">

                            @else

                                <div class="table-avatar">

                                    <i class="bi bi-person"></i>

                                </div>

                            @endif

                        </td>

                        <td>

                            {{ $item->nama }}

                        </td>

                        <td>

                            <span class="jabatan-badge">

                                {{ $item->jabatan }}

                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="empty-data">

            <i class="bi bi-people"></i>

            <h3>
                Data Perangkat Belum Tersedia
            </h3>

            <p>
                Silakan tambahkan data perangkat melalui panel admin.
            </p>

        </div>

        @endif

    </div>

</section>

@endsection