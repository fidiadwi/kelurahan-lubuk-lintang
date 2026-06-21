@extends('admin.layouts.app')

@section('content')

<div class="dashboard-header">

    <h1>Ringkasan Dashboard</h1>

    <p>
        Selamat datang kembali, Admin.
    </p>

</div>

<div class="stats-grid">

    <div class="stat-card blue">
        <span>TOTAL ASPIRASI</span>
        <h2>124</h2>
    </div>

    <div class="stat-card red">
        <span>MENUNGGU</span>
        <h2>12</h2>
    </div>

    <div class="stat-card yellow">
        <span>DIPROSES</span>
        <h2>45</h2>
    </div>

    <div class="stat-card green">
        <span>SELESAI</span>
        <h2>67</h2>
    </div>

</div>

<div class="dashboard-grid">

    <div class="aspirasi-box">

        <div class="box-header">

            <h3>Aspirasi Warga Terbaru</h3>

            <a href="#">Lihat Semua</a>

        </div>

        <table>

            <thead>

                <tr>
                    <th>Tanggal</th>
                    <th>Warga</th>
                    <th>Topik</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>24 Okt 2024</td>
                    <td>Anwar Subagjo</td>
                    <td>Lampu Jalan Mati</td>
                    <td>
                        <span class="badge pending">
                            Pending
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>23 Okt 2024</td>
                    <td>Siti Aminah</td>
                    <td>Perbaikan Drainase</td>
                    <td>
                        <span class="badge selesai">
                            Selesai
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>22 Okt 2024</td>
                    <td>Bambang Irawan</td>
                    <td>Pembersihan Selokan</td>
                    <td>
                        <span class="badge proses">
                            Diproses
                        </span>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

    <div class="right-panel">

        <div class="berita-box">

            <h3>Berita & Pengumuman</h3>

            <div class="berita-item">

                <strong>
                    Gotong Royong Kebersihan Lingkungan
                </strong>

                <small>
                    20 Okt 2024
                </small>

            </div>

            <div class="berita-item">

                <strong>
                    Jadwal Pelayanan Akta Kelahiran
                </strong>

                <small>
                    18 Okt 2024
                </small>

            </div>

        </div>

        <div class="profil-box">

            <h3>Profil Kelurahan</h3>

            <p>

                Pastikan data profil, visi misi
                dan sejarah kelurahan selalu
                diperbarui.

            </p>

            <button>
                Kelola Profil
            </button>

        </div>

    </div>

</div>

@endsection