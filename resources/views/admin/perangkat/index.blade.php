@extends('admin.layouts.app')

@section('title','Perangkat Kelurahan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/perangkat.css') }}">
@endsection

@section('content')

@if(session('success'))

<div class="alert-success">
    {{ session('success') }}
</div>

@endif

<div class="stats-card">

    <div>

        <span>Total Perangkat</span>

        <h2>{{ $totalPerangkat }}</h2>

    </div>

    <i class="bi bi-people-fill"></i>

</div>

<div class="table-card">

    <div class="table-header">

        <h3>Data Perangkat Kelurahan</h3>

    </div>

    <form
        action="{{ route('admin.perangkat.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="form-card">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Nama</label>

                <input
                    type="text"
                    name="nama"
                    required>

            </div>

            <div class="form-group">

                <label>Jabatan</label>

                <input
                    type="text"
                    name="jabatan"
                    required>

            </div>

            <div class="form-group">

                <label>Urutan</label>

                <input
                    type="number"
                    name="urutan"
                    value="0">

            </div>

            <div class="form-group">

                <label>Foto</label>

                <input
                    type="file"
                    name="foto">

            </div>

        </div>

        <button
            type="submit"
            class="btn-save">

            <i class="bi bi-plus-circle"></i>

            Tambah Perangkat

        </button>

    </form>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Urutan</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($perangkat as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>

                    @if($item->foto)

                        <img
                            src="{{ asset('uploads/perangkat/'.$item->foto) }}"
                            class="foto-perangkat">

                    @else

                        -

                    @endif

                </td>

                <td>{{ $item->nama }}</td>

                <td>{{ $item->jabatan }}</td>

                <td>{{ $item->urutan }}</td>

                <td>

                    <button
                        type="button"
                        class="btn-edit"
                        onclick="toggleEdit({{ $item->id }})">

                        <i class="bi bi-pencil"></i>

                    </button>

                    <form
                        action="{{ route('admin.perangkat.destroy',$item->id) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn-delete"
                            onclick="return confirm('Hapus perangkat ini?')">

                            <i class="bi bi-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            <tr
                id="edit-{{ $item->id }}"
                style="display:none;">

                <td colspan="6">

                    <div class="edit-box">

                        <form
                            action="{{ route('admin.perangkat.update',$item->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-grid">

                                <div class="form-group">

                                    <label>Nama</label>

                                    <input
                                        type="text"
                                        name="nama"
                                        value="{{ $item->nama }}"
                                        required>

                                </div>

                                <div class="form-group">

                                    <label>Jabatan</label>

                                    <input
                                        type="text"
                                        name="jabatan"
                                        value="{{ $item->jabatan }}"
                                        required>

                                </div>

                                <div class="form-group">

                                    <label>Urutan</label>

                                    <input
                                        type="number"
                                        name="urutan"
                                        value="{{ $item->urutan }}">

                                </div>

                                <div class="form-group">

                                    <label>Foto Baru</label>

                                    <input
                                        type="file"
                                        name="foto">

                                </div>

                            </div>

                            <button
                                type="submit"
                                class="btn-save">

                                <i class="bi bi-check-circle"></i>

                                Simpan Perubahan

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="empty-row">

                    Belum ada data perangkat

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<script>

function toggleEdit(id)
{
    let row = document.getElementById('edit-' + id);

    if(row.style.display === 'none')
    {
        row.style.display = 'table-row';
    }
    else
    {
        row.style.display = 'none';
    }
}

</script>

@endsection