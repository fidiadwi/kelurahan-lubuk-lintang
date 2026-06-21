@extends('admin.layouts.app')

@section('title','Laporan & Pesan')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endsection

@section('content')

@if(session('success'))

<div class="alert-success">
    {{ session('success') }}
</div>

@endif

@if(session('error'))

<div class="alert-error">
    {{ session('error') }}
</div>

@endif

<div class="laporan-stats">

    <div class="laporan-card">

        <i class="bi bi-envelope-paper"></i>

        <div>
            <span>Total Pesan</span>
            <h3>{{ $totalPesan }}</h3>
        </div>

    </div>

    <div class="laporan-card">

        <i class="bi bi-envelope-fill"></i>

        <div>
            <span>Pesan Baru</span>
            <h3>{{ $pesanBaru }}</h3>
        </div>

    </div>

    <div class="laporan-card">

        <i class="bi bi-check-circle"></i>

        <div>
            <span>Sudah Dibalas</span>
            <h3>{{ $sudahDibalas }}</h3>
        </div>

    </div>

</div>

<div class="table-card">

    <div class="table-header">
        <h3>Daftar Pesan Masuk</h3>
    </div>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Subjek</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($pesans as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama }}</td>

                <td>{{ $item->no_hp }}</td>

                <td>{{ $item->subjek }}</td>

                <td>

                    @if($item->status == 'baru')

                        <span class="badge badge-baru">
                            Baru
                        </span>

                    @elseif($item->status == 'dibaca')

                        <span class="badge badge-dibaca">
                            Dibaca
                        </span>

                    @elseif($item->status == 'dibalas')

                        <span class="badge badge-dibalas">
                            Dibalas
                        </span>

                    @endif

                </td>

                <td>
                    {{ $item->created_at->format('d M Y H:i') }}
                </td>

                <td>

                    <div class="action-buttons">

                        <button
                            type="button"
                            class="btn-detail"
                            onclick="toggleDetail({{ $item->id }})">

                            <i class="bi bi-eye"></i>

                        </button>

                        @if($item->status == 'baru')

                        <a
                            href="{{ route('admin.laporan.dibaca',$item->id) }}"
                            class="btn-read">

                            <i class="bi bi-check-lg"></i>

                        </a>

                        @endif

                    </div>

                </td>

            </tr>

            <tr
                id="detail-{{ $item->id }}"
                class="detail-row"
                style="display:none;">

                <td colspan="7">

                    <div class="detail-box">

                        <h4>Detail Pesan</h4>

                        <p>
                            <strong>Nama :</strong>
                            {{ $item->nama }}
                        </p>

                        <p>
                            <strong>No HP :</strong>
                            {{ $item->no_hp }}
                        </p>

                        <p>
                            <strong>Subjek :</strong>
                            {{ $item->subjek }}
                        </p>

                        <p>
                            <strong>Pesan :</strong>
                        </p>

                        <div class="pesan-box">
                            {{ $item->pesan }}
                        </div>

                        @if($item->balasan)

                        <div class="balasan-box">

                            <strong>
                                Balasan Terakhir Admin
                            </strong>

                            <p>
                                {{ $item->balasan }}
                            </p>

                        </div>

                        @endif

                        <hr>

                        <form
                            action="{{ route('admin.laporan.balas',$item->id) }}"
                            method="POST">

                            @csrf

                            <label>
                                Balasan Admin
                            </label>

                            <textarea
                                name="balasan"
                                rows="5"
                                required>{{ $item->balasan }}</textarea>

                            <button
                                type="submit"
                                class="btn-wa">

                                <i class="bi bi-whatsapp"></i>

                                Kirim WhatsApp

                            </button>

                        </form>

                        <form
                            action="{{ route('admin.laporan.destroy',$item->id) }}"
                            method="POST"
                            style="margin-top:10px;">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-delete"
                                onclick="return confirm('Yakin ingin menghapus pesan ini?')">

                                <i class="bi bi-trash"></i>

                                Hapus Pesan

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="empty-row">

                    Belum ada pesan masuk

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<script>

function toggleDetail(id)
{
    let row = document.getElementById('detail-' + id);

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