<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title','Kelurahan Lubuk Lintang')</title>

<link rel="stylesheet" href="{{ asset('css/public.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@yield('styles')

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-inner">

        <div class="nav-logo">
            <div class="nav-logo-img">
                <img src="{{ asset('images/logo.png') }}">
            </div>
            <div class="nav-logo-text">
                <h4>Kelurahan</h4>
                <span>Lubuk Lintang</span>
            </div>
        </div>

        <button class="nav-hamburger" id="navHamburger" aria-label="Menu">
            <i class="bi bi-list"></i>
        </button>

        <div class="nav-menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
            <a href="{{ route('perangkat') }}" class="{{ request()->routeIs('perangkat') ? 'active' : '' }}">Pemerintah</a>
            <a href="{{ route('dokumentasi') }}" class="{{ request()->routeIs('dokumentasi') ? 'active' : '' }}">Dokumentasi Kegiatan</a>
            <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
        </div>

        <a href="{{ route('login') }}" class="btn-admin">
            <i class="bi bi-person-circle"></i>
            Admin
        </a>

    </div>
</nav>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<!-- CONTENT -->
<main>
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">

        <div class="footer-grid">

            <!-- KOLOM 1 -->
            <div class="footer-col">

                <div class="footer-brand">
                    <div class="nav-logo-img">
                         <img src="{{ asset('images/logo.png') }}">
                    </div>
                    <div>
                        <h3>Kelurahan<br>Lubuk Lintang</h3>
                    </div>
                </div>
                <p style="margin-top:14px;">
                    Website resmi Kelurahan Lubuk Lintang
                    sebagai media informasi, komunikasi,
                    dan pelayanan masyarakat.
                </p>
                <div class="footer-social">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <!-- KOLOM 2 -->
            <div class="footer-col">
                <h4>Menu Cepat</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profil') }}">Profil</a></li>
                    <li><a href="{{ route('perangkat') }}">Pemerintah</a></li>
                    <li><a href="{{ route('dokumentasi') }}">Dokumentasi Kegiatan</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <!-- KOLOM 3 -->
            <div class="footer-col">
                <h4>Jam Pelayanan</h4>
                <p>Senin - Jumat</p>
                <p>08.00 - 16.00 WIB</p>
                <p style="margin-top:10px;">
                    Kami siap melayani dengan
                    sepenuh hati dan profesional.
                </p>
            </div>

            <!-- KOLOM 4 -->
            <div class="footer-col">
                <h4>Lokasi Kami</h4>
                <iframe
                    src="https://maps.google.com/maps?q=kantor%20lurah%20lubuk%20lintang&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="140"
                    style="border:0;border-radius:12px;"
                    loading="lazy">
                </iframe>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 Kelurahan Lubuk Lintang. All rights reserved.</p>
            <p>Dibuat dengan <i class="bi bi-heart-fill" style="color:#ef4444;"></i> untuk masyarakat Lubuk Lintang</p>
        </div>

    </div>
</footer>

<script>
    const hamburger = document.getElementById('navHamburger');
    const navMenu = document.getElementById('navMenu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function () {
            navMenu.classList.toggle('open');
        });
    }
</script>

</body>
</html>