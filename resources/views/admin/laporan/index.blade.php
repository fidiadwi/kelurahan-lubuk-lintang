@extends('admin.layouts.app')

@section('content')

<div class="page-header">
    <h1>Laporan & Pesan</h1>
    <p>Kelola pesan dan laporan yang masuk dari masyarakat.</p>
</div>

<div class="stats-grid">

    <div class="stat-card">
        <h4>Total Pesan</h4>
        <span>0</span>
    </div>

    <div class="stat-card">
        <h4>Baru</h4>
        <span>0</span>
    </div>

    <div class="stat-card">
        <h4>Dibaca</h4>
        <span>0</span>
    </div>

    <div class="stat-card">
        <h4>Selesai</h4>
        <span>0</span>
    </div>

</div>

<div class="table-card">

    <div class="table-header">
        <h3>Pesan Masuk</h3>
    </div>

    <table>

        <thead>

            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Subjek</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada pesan masuk.
                </td>
            </tr>

        </tbody>

    </table>

</div>

@endsection