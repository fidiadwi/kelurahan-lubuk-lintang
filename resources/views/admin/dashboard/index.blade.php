@extends('admin.layouts.app')

@section('title','Dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')

<div class="welcome-banner">

    <div class="welcome-content">

        <span class="welcome-badge">
            Sistem Informasi Kelurahan Lubuk Lintang
        </span>

        <h2>
            Selamat Datang, Admin 👋
        </h2>

        <p>
            Kelola profil kelurahan, data perangkat, galeri dokumentasi,
            dan pesan masyarakat dalam satu dashboard terintegrasi.
        </p>

    </div>

    <div class="welcome-image">

        <img src="{{ asset('images/kantor-kelurahan.jpg') }}"
             alt="Kantor Kelurahan">

    </div>

</div>

<div class="stats-grid">

    <div class="stat-card blue">

        <div class="stat-header">

            <div class="stat-icon blue-bg">
                <i class="bi bi-envelope-paper"></i>
            </div>

            <div>
                <span>Total Pesan</span>
                <h2>{{ $totalPesan }}</h2>
            </div>

        </div>

        <small>Pesan masuk dari masyarakat</small>

    </div>

    <div class="stat-card green">

        <div class="stat-header">

            <div class="stat-icon green-bg">
                <i class="bi bi-images"></i>
            </div>

            <div>
                <span>Total Galeri</span>
                <h2>{{ $totalGaleri }}</h2>
            </div>

        </div>

        <small>Dokumentasi kegiatan</small>

    </div>

    <div class="stat-card yellow">

        <div class="stat-header">

            <div class="stat-icon yellow-bg">
                <i class="bi bi-people"></i>
            </div>

            <div>
                <span>Total Perangkat</span>
                <h2>{{ $totalPerangkat }}</h2>
            </div>

        </div>

        <small>Perangkat Kelurahan</small>

    </div>

    <div class="stat-card purple">

        <div class="stat-header">

            <div class="stat-icon purple-bg">
                <i class="bi bi-building"></i>
            </div>

            <div>
                <span>Profil Kelurahan</span>
                <h2>{{ $totalProfil }}</h2>
            </div>

        </div>

        <small>Data profil tersedia</small>

    </div>

</div>

<div class="dashboard-grid">

    <div class="table-card">

        <div class="table-header">

            <h3>Pesan Terbaru</h3>

            <a href="{{ route('admin.laporan') }}">
                Lihat Semua
            </a>

        </div>

        <table>

            <thead>

                <tr>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                </tr>

            </thead>

            <tbody>

                @forelse($pesanTerbaru as $pesan)

                <tr>

                    <td>{{ $pesan->nama }}</td>

                    <td>{{ $pesan->no_hp }}</td>

                    <td>{{ $pesan->subjek }}</td>

                    <td>
                        {{ $pesan->created_at->format('d M Y') }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="empty-row">

                        <i class="bi bi-envelope"></i><br>
                        Belum ada pesan masuk

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="quick-menu">

        <h3>Quick Menu</h3>

        <a href="/admin/profil" class="quick-item">

            <div class="quick-left">

                <div class="stat-icon blue-bg">
                    <i class="bi bi-building"></i>
                </div>

                <div>

                    <strong>Profil Kelurahan</strong>

                    <small>
                        Edit informasi kelurahan
                    </small>

                </div>

            </div>

            <i class="bi bi-chevron-right quick-arrow"></i>

        </a>

        <a href="/admin/galeri" class="quick-item">

            <div class="quick-left">

                <div class="stat-icon green-bg">
                    <i class="bi bi-images"></i>
                </div>

                <div>

                    <strong>Galeri Dokumentasi</strong>

                    <small>
                        Kelola dokumentasi kegiatan
                    </small>

                </div>

            </div>

            <i class="bi bi-chevron-right quick-arrow"></i>

        </a>

        <a href="/admin/laporan" class="quick-item">

            <div class="quick-left">

                <div class="stat-icon yellow-bg">
                    <i class="bi bi-envelope-paper"></i>
                </div>

                <div>

                    <strong>Laporan & Pesan</strong>

                    <small>
                        Pesan dari masyarakat
                    </small>

                </div>

            </div>

            <i class="bi bi-chevron-right quick-arrow"></i>

        </a>

    </div>

</div>

@endsection