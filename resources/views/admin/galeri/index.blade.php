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
                id="fotoPreview"
                required>
        </div>

        <div class="preview-wrapper">
            <img
                id="previewImage"
                src=""
                alt="Preview Foto"
                class="preview-image"
                style="display:none;">
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

    <div>

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

                <div class="gallery-action">

                    <button
                        type="button"
                        class="btn-edit"
                        onclick="toggleEdit({{ $item->id }})">

                        <i class="bi bi-pencil"></i>

                        Edit

                    </button>

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

        </div>

        <div
            id="edit-{{ $item->id }}"
            class="edit-galeri"
            style="display:none;">

            <form
                action="{{ route('admin.galeri.update',$item->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>Judul Kegiatan</label>

                    <input
                        type="text"
                        name="judul"
                        value="{{ $item->judul }}"
                        required>

                </div>

                <div class="form-group">

                    <label>Tanggal Kegiatan</label>

                    <input
                        type="date"
                        name="tanggal_kegiatan"
                        value="{{ $item->tanggal_kegiatan }}"
                        required>

                </div>

                <div class="form-group">

                    <label>Keterangan</label>

                    <textarea
                        name="keterangan"
                        rows="4">{{ $item->keterangan }}</textarea>

                </div>

                <div class="form-group">

                    <label>Foto Baru (Opsional)</label>

                    <input
                        type="file"
                        name="foto">

                </div>

                <button
                    type="submit"
                    class="btn-upload">

                    <i class="bi bi-check-circle"></i>

                    Simpan Perubahan

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

<script>

function toggleEdit(id)
{
    let form = document.getElementById('edit-' + id);

    if(form.style.display === 'none')
    {
        form.style.display = 'block';
    }
    else
    {
        form.style.display = 'none';
    }
}

</script>

<script>

const fotoInput =
    document.getElementById('fotoPreview');

if(fotoInput)
{
    fotoInput.addEventListener('change', function(e){

        let file = e.target.files[0];

        if(file)
        {
            let reader = new FileReader();

            reader.onload = function(event)
            {
                let preview =
                    document.getElementById('previewImage');

                preview.src = event.target.result;

                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }

    });
}

</script>

@endsection