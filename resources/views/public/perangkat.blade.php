@extends('public.layouts.app')

@section('title','Perangkat Kelurahan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/perangkatweb.css') }}">
@endsection

@section('content')

@php

$lurah = $perangkat->firstWhere('level','lurah');

$sekretaris = $perangkat->where('parent_id', optional($lurah)->id)
                        ->firstWhere('level','sekretaris');

$kasiList = $perangkat->where('parent_id', optional($sekretaris)->id)
                      ->where('level','kasi');

$stafList = $perangkat->where('level','staf');

$rwList = $perangkat->where('level','rw');

$rtList = $perangkat->where('level','rt');

@endphp

{{-- ============================
     HEADER
============================= --}}

<section
    class="perangkat-header"
    style="
        background:
        linear-gradient(rgba(7,26,65,.80), rgba(11,46,99,.74)),
        url('{{ !empty($profil->banner_perangkat)
                ? asset('uploads/profil/'.$profil->banner_perangkat)
                : asset('images/kantor-kelurahan.jpg') }}')
        center center / cover no-repeat;
    ">

    <div class="container">

        <div class="perangkat-breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <i class="bi bi-chevron-right"></i>
            <span>Pemerintah (Perangkat Desa)</span>
        </div>

        <h1>
            Perangkat <br>
            <span class="perangkat-highlight">
                {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}
            </span>
        </h1>

        <p>
            Struktur organisasi dan aparatur yang bertugas dalam
            memberikan pelayanan terbaik kepada masyarakat.
        </p>

    </div>

</section>

    {{-- Stats Bar --}}
    <div class="perangkat-stats-bar">
        <div class="container">
            <div class="perangkat-stats-grid">

                <div class="perangkat-stat-item">
                    <div class="stat-icon" style="background:#EEF2FF;">
                        <i class="bi bi-people-fill" style="color:#2563EB;"></i>
                    </div>
                    <div class="stat-body">
                        <strong>{{ $perangkat->count() ?? '-' }}</strong>
                        <span>Perangkat<br>Kelurahan</span>
                    </div>
                </div>

               <div class="perangkat-stat-item">
                    <div class="stat-icon" style="background:#FFF7ED;">
                        <i class="bi bi-building" style="color:#D97706;"></i>
                    </div>

                    <div class="stat-body">
                        <strong class="nowrap">
                            {{ $profil->jumlah_rt_rw ?: '-' }}
                        </strong>
                        <span>RT / RW</span>
                    </div>
                </div>

                <div class="perangkat-stat-item">
                    <div class="stat-icon" style="background:#F5F3FF;">
                        <i class="bi bi-calendar-event-fill" style="color:#7C3AED;"></i>
                    </div>
                    <div class="stat-body">
                        <strong>{{ $profil->tahun_berdiri ?? '-' }}</strong>
                        <span>Tahun<br>Berdiri</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{-- ============================
     PIMPINAN / LURAH
============================= --}}

@if($lurah)

<section class="kepala-kelurahan">

    <div class="container">

        <div class="kepala-card">

            <div class="kepala-grid">

                <div class="kepala-foto">

                    @if($lurah->foto)
                        <img
                            src="{{ asset('uploads/perangkat/'.$lurah->foto) }}"
                            alt="{{ $lurah->nama }}">
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
                        {{ $lurah->nama }}
                    </h2>

                    <h4>
                        {{ $lurah->jabatan }} {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}
                    </h4>

                    <p>
                        {{ $lurah->deskripsi ?? 'Memimpin penyelenggaraan pemerintahan, pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat '.($profil->nama_kelurahan ?? 'Kelurahan Lubuk Lintang').'.' }}
                    </p>

                    <div class="kepala-detail-list">

                       <div class="kepala-detail-item">
                            <i class="bi bi-person-vcard-fill"></i>
                            <span class="detail-label">NIP</span>
                            <span class="detail-value">
                                {{ $lurah->nip ?: '-' }}
                            </span>
                        </div>

                        <div class="kepala-detail-item">
                            <i class="bi bi-calendar2-week-fill"></i>
                            <span class="detail-label">Masa Jabatan</span>
                            <span class="detail-value">
                                {{ $lurah->masa_jabatan ?: '-' }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endif

{{-- ============================
     STRUKTUR ORGANISASI
============================= --}}

<section class="struktur-organisasi">

<div class="container">

<div class="diagram">

    {{-- LURAH --}}

    @if($lurah)

    <div class="diagram-lurah">

        <div class="box biru">

            <h4>{{ strtoupper($lurah->jabatan) }}</h4>

            <span>{{ $lurah->nama }}</span>

            <small>NIP : {{ $lurah->nip ?: '-' }}</small>

        </div>

    </div>

    @else

    <div class="diagram-lurah">

        <div class="box biru">

            <h4>LURAH</h4>

            <span>Belum ada data</span>

            <small>NIP : -</small>

        </div>
        
    </div>

    @endif


    {{-- SEKRETARIS --}}

    @if($sekretaris)

    <div class="diagram-sekretaris">

        <div class="box putih">

            <h4>{{ strtoupper($sekretaris->jabatan) }}</h4>

            <span>{{ $sekretaris->nama }}</span>

        </div>

    </div>

    @endif


    {{-- KASI --}}

    <div class="diagram-kasi">

        @foreach($kasiList as $kasi)

        <div class="kasi-item">

            <div class="box putih">

                <h4>{{ strtoupper($kasi->jabatan) }}</h4>

                <span>{{ $kasi->nama }}</span>

            </div>

            @php
                $staf = $stafList->where('parent_id',$kasi->id);
            @endphp

            @foreach($staf as $item)

            <div class="box kecil">

                {{ $item->nama }}

            </div>

            @endforeach

        </div>

        @endforeach

    </div>


    {{-- RW --}}

    <div class="diagram-rw">

        @foreach($rwList as $rw)

        <div class="rw-item">

            <div class="box biru">

                {{ strtoupper($rw->jabatan) }}

                <br>

                {{ $rw->nama }}

            </div>

            @php
                $rt = $rtList->where('parent_id',$rw->id);
            @endphp

            <div class="diagram-rt">

                @foreach($rt as $item)

                <div class="box mini">

                    {{ strtoupper($item->jabatan) }}

                    <br>

                    {{ $item->nama }}

                </div>

                @endforeach

            </div>

        </div>

        @endforeach

    </div>

</div>

</div>

</section>

{{-- ============================
     DAFTAR PERANGKAT (SCROLL HORIZONTAL)
============================= --}}

<section class="perangkat-list">

    <div class="container">

        <div class="perangkat-list-header">
            <div>
                <h2>Daftar Perangkat Kelurahan</h2>
                <p>Aparatur yang bertugas melayani masyarakat</p>
            </div>
        </div>

        <div class="perangkat-scroll">

            @foreach($perangkat as $item)

            <div class="perangkat-card">

                <div class="perangkat-avatar">
                    @if($item->foto)
                        <img
                            src="{{ asset('uploads/perangkat/'.$item->foto) }}"
                            alt="{{ $item->nama }}">
                    @else
                        <div class="avatar-kosong">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>

                <div class="perangkat-body">

                    <h4>{{ $item->nama }}</h4>

                    <span class="jabatan-badge">
                        {{ $item->jabatan }}
                    </span>

                    <div class="perangkat-info">
                        <p>
                            <strong>NIP</strong><br>
                            {{ $item->nip ?: '-' }}
                        </p>

                        <p>
                            <strong>Masa Jabatan</strong><br>
                            {{ $item->masa_jabatan ?: '-' }}
                        </p>

                    </div>

                  

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection