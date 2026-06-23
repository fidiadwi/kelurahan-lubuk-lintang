@extends('admin.layouts.app')

@section('title','Galeri Dokumentasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
@endsection

@section('content')

@if(session('success'))

<div class="alert-success">
    {{ session('success') }}
</div>

@endif

<div class="stats-card">

    <div>

        <span>Total Dokumentasi</span>

        <h2>{{ $totalGaleri }}</h2>

    </div>

    <i class="bi bi-images"></i>

</div>

<div class="upload-card">

    <h3>Tambah Dokumentasi</h3>

    <form
        action="{{ route('admin.galeri.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Judul Kegiatan</label>

                <input
                    type="text"
                    name="judul"
                    required>

            </div>

            <div class="form-group">

                <label>Tanggal Kegiatan</label>

                <input
                    type="date"
                    name="tanggal_kegiatan"
                    required>

            </div>

        </div>

        <div class="form-group">

            <label>Keterangan</label>

            <textarea
                name="keterangan"
                rows="4"></textarea>

        </div>

        <div class="form-group">

            <label>Foto Dokumentasi</label>

            <input
                type="file"
                name="foto"
                required>

        </div>

        <button
            type="submit"
            class="btn-upload">

            <i class="bi bi-cloud-upload"></i>

            Upload Dokumentasi

        </button>

    </form>

</div>

<div class="gallery-grid">

    @forelse($galeri as $item)

    <div class="gallery-card">

        <img
            src="{{ asset('uploads/galeri/'.$item->foto) }}"
            alt="{{ $item->judul }}">

        <div class="gallery-body">

            <h4>{{ $item->judul }}</h4>

            <small>
                {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}
            </small>

            <p>
                {{ $item->keterangan }}
            </p>

            <form
                action="{{ route('admin.galeri.destroy',$item->id) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn-delete">

                    <i class="bi bi-trash"></i>

                    Hapus

                </button>

            </form>

        </div>

    </div>

    @empty

    <div class="empty-gallery">

        Belum ada dokumentasi kegiatan

    </div>

    @endforelse

</div>

@endsection