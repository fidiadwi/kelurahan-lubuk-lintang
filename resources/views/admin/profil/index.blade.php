@extends('admin.layouts.app')

@section('title','Profil Kelurahan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endsection

@section('content')

@if(session('success'))

<div class="alert-success">

    <i class="bi bi-check-circle-fill"></i>

    {{ session('success') }}

</div>

@endif

<form
    action="{{ route('admin.profil.update') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    {{-- INFORMASI UMUM --}}
    <div class="profil-section">

        <div class="section-header">

            <i class="bi bi-building"></i>

            <div>

                <h3>Informasi Umum</h3>

                <p>
                    Data dasar kelurahan yang akan tampil pada website.
                </p>

            </div>

        </div>

        <div class="form-grid">

            <div class="form-group">

                <label>Nama Kelurahan</label>

                <input
                    type="text"
                    name="nama_kelurahan"
                    value="{{ old('nama_kelurahan',$profil->nama_kelurahan ?? '') }}"
                    required>

            </div>

            <div class="form-group">

                <label>Tahun Berdiri</label>

                <input
                    type="text"
                    name="tahun_berdiri"
                    value="{{ old('tahun_berdiri',$profil->tahun_berdiri ?? '') }}">

            </div>

        </div>

        <div class="form-group">

            <label>Alamat</label>

            <textarea
                name="alamat"
                rows="4">{{ old('alamat',$profil->alamat ?? '') }}</textarea>

        </div>

        <div class="form-grid">

            <div class="form-group">

                <label>Telepon</label>

                <input
                    type="text"
                    name="telepon"
                    value="{{ old('telepon',$profil->telepon ?? '') }}">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$profil->email ?? '') }}">

            </div>

        </div>

    </div>

    {{-- SEJARAH --}}
    <div class="profil-section">

        <div class="section-header">

            <i class="bi bi-clock-history"></i>

            <div>

                <h3>Sejarah Kelurahan</h3>

                <p>
                    Informasi sejarah singkat kelurahan.
                </p>

            </div>

        </div>

        <div class="form-group">

            <textarea
                name="sejarah"
                rows="8">{{ old('sejarah',$profil->sejarah ?? '') }}</textarea>

        </div>

    </div>

    {{-- VISI MISI --}}
    <div class="profil-section">

        <div class="section-header">

            <i class="bi bi-bullseye"></i>

            <div>

                <h3>Visi & Misi</h3>

                <p>
                    Visi dan misi pembangunan kelurahan.
                </p>

            </div>

        </div>

        <div class="form-group">

            <label>Visi</label>

            <textarea
                name="visi"
                rows="4">{{ old('visi',$profil->visi ?? '') }}</textarea>

        </div>

        <div class="form-group">

            <label>Misi</label>

            <textarea
                name="misi"
                rows="8">{{ old('misi',$profil->misi ?? '') }}</textarea>

        </div>

    </div>

    {{-- FOTO --}}
    <div class="profil-section">

        <div class="section-header">

            <i class="bi bi-image"></i>

            <div>

                <h3>Foto Kantor Kelurahan</h3>

                <p>
                    Foto yang akan tampil pada halaman publik.
                </p>

            </div>

        </div>

        @if(!empty($profil->foto_kantor))

        <img
            src="{{ asset('uploads/profil/'.$profil->foto_kantor) }}"
            class="preview-image">

        @endif

        <div class="form-group">

            <input
                type="file"
                name="foto_kantor">

        </div>

    </div>

    {{-- BANNER WEBSITE --}}
    <div class="profil-section">

        <div class="section-header">

            <i class="bi bi-images"></i>

            <div>

                <h3>Banner Website</h3>

                <p>
                    Banner untuk masing-masing halaman website.
                </p>

            </div>

        </div>

        <div class="form-grid">

            {{-- Banner Beranda --}}
            <div class="form-group">

                <label>Banner Beranda</label>

                @if(!empty($profil->banner_beranda))
                    <img
                        src="{{ asset('uploads/profil/'.$profil->banner_beranda) }}"
                        class="preview-image">
                @endif

                <input
                    type="file"
                    name="banner_beranda">

            </div>

            {{-- Banner Profil --}}
            <div class="form-group">

                <label>Banner Profil</label>

                @if(!empty($profil->banner_profil))
                    <img
                        src="{{ asset('uploads/profil/'.$profil->banner_profil) }}"
                        class="preview-image">
                @endif

                <input
                    type="file"
                    name="banner_profil">

            </div>

            {{-- Banner Pemerintah --}}
            <div class="form-group">

                <label>Banner Pemerintah</label>

                @if(!empty($profil->banner_perangkat))
                    <img
                        src="{{ asset('uploads/profil/'.$profil->banner_perangkat) }}"
                        class="preview-image">
                @endif

                <input
                    type="file"
                    name="banner_perangkat">

            </div>

            {{-- Banner Dokumentasi --}}
            <div class="form-group">

                <label>Banner Dokumentasi</label>

                @if(!empty($profil->banner_dokumentasi))
                    <img
                        src="{{ asset('uploads/profil/'.$profil->banner_dokumentasi) }}"
                        class="preview-image">
                @endif

                <input
                    type="file"
                    name="banner_dokumentasi">

            </div>

            {{-- Banner Kontak --}}
            <div class="form-group">

                <label>Banner Kontak</label>

                @if(!empty($profil->banner_kontak))
                    <img
                        src="{{ asset('uploads/profil/'.$profil->banner_kontak) }}"
                        class="preview-image">
                @endif

                <input
                    type="file"
                    name="banner_kontak">

            </div>

        </div>

    </div>

    {{-- DATA STATISTIK --}}

    <div class="profil-section">
    <div class="section-header">

        <i class="bi bi-bar-chart"></i>

        <div>

            <h3>Data Statistik Kelurahan</h3>

            <p>
                Data statistik yang akan ditampilkan pada halaman profil.
            </p>

        </div>

    </div>

    <div class="form-grid">

        <div class="form-group">

            <label>Luas Wilayah</label>

            <input
                type="text"
                name="luas_wilayah"
                value="{{ old('luas_wilayah',$profil->luas_wilayah ?? '') }}"
                placeholder="Contoh: 12 Km²">

        </div>

        <div class="form-group">

            <label>Jumlah Penduduk</label>

            <input
                type="text"
                name="jumlah_penduduk"
                value="{{ old('jumlah_penduduk',$profil->jumlah_penduduk ?? '') }}"
                placeholder="Contoh: 4.200 Jiwa">

        </div>

    </div>

    <div class="form-grid">

        <div class="form-group">

            <label>Jumlah RT / RW</label>

            <input
                type="text"
                name="jumlah_rt_rw"
                value="{{ old('jumlah_rt_rw',$profil->jumlah_rt_rw ?? '') }}"
                placeholder="Contoh: 8 RT / 2 RW">

        </div>

        <div class="form-group">

            <label>Jumlah KK</label>

            <input
                type="text"
                name="jumlah_kk"
                value="{{ old('jumlah_kk',$profil->jumlah_kk ?? '') }}"
                placeholder="Contoh: 1.350 KK">

        </div>

    </div>

    </div>

    {{-- BATAS WILAYAH --}}

    <div class="profil-section">
    <div class="section-header">

        <i class="bi bi-map"></i>

        <div>

            <h3>Batas Wilayah</h3>

            <p>
                Informasi batas wilayah administrasi kelurahan.
            </p>

        </div>

    </div>

    <div class="form-grid">

        <div class="form-group">

            <label>Batas Utara</label>

            <input
                type="text"
                name="batas_utara"
                value="{{ old('batas_utara',$profil->batas_utara ?? '') }}">

        </div>

        <div class="form-group">

            <label>Batas Selatan</label>

            <input
                type="text"
                name="batas_selatan"
                value="{{ old('batas_selatan',$profil->batas_selatan ?? '') }}">

        </div>

    </div>

    <div class="form-grid">

        <div class="form-group">

            <label>Batas Timur</label>

            <input
                type="text"
                name="batas_timur"
                value="{{ old('batas_timur',$profil->batas_timur ?? '') }}">

        </div>

        <div class="form-group">

            <label>Batas Barat</label>

            <input
                type="text"
                name="batas_barat"
                value="{{ old('batas_barat',$profil->batas_barat ?? '') }}">

        </div>

    </div>
    </div>

    {{-- GOOGLE MAPS --}}

    <div class="profil-section">
    <div class="section-header">

        <i class="bi bi-geo-alt"></i>

        <div>

            <h3>Google Maps</h3>

            <p>
                Tempel link embed Google Maps lokasi kantor kelurahan.
            </p>

        </div>

    </div>

    <div class="form-group">

        <label>Link Maps Embed</label>

        <textarea
            name="maps_embed"
            rows="5"
            placeholder="https://www.google.com/maps/embed?...">{{ old('maps_embed',$profil->maps_embed ?? '') }}</textarea>

    </div>

    </div>


    <button
        type="submit"
        class="btn-save">

        <i class="bi bi-check-circle"></i>

        Simpan Perubahan

    </button>

</form>

@endsection