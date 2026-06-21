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

    <button
        type="submit"
        class="btn-save">

        <i class="bi bi-check-circle"></i>

        Simpan Perubahan

    </button>

</form>

@endsection