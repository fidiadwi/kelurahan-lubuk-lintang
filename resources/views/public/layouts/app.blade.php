<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
    @yield('title','Kelurahan Lubuk Lintang')
</title>

<link rel="stylesheet"
      href="{{ asset('css/public.css') }}">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

@yield('styles')

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

    <div class="logo">

        <div class="logo-icon">
            <i class="bi bi-bank"></i>
        </div>

        <div class="logo-text">

            <h4>Kelurahan</h4>

            <span>Lubuk Lintang</span>

        </div>

    </div>

   <div class="nav-menu">
        <a href="{{ route('home') }}"
        class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Beranda
        </a>

        <a href="{{ route('profil') }}"
        class="{{ request()->routeIs('profil') ? 'active' : '' }}">
            Profil
        </a>

        <a href="{{ route('perangkat') }}"
        class="{{ request()->routeIs('perangkat') ? 'active' : '' }}">
            Perangkat
        </a>

        <a href="{{ route('dokumentasi') }}"
        class="{{ request()->routeIs('dokumentasi') ? 'active' : '' }}">
            Dokumentasi
        </a>

        <a href="{{ route('kontak') }}"
        class="{{ request()->routeIs('kontak') ? 'active' : '' }}">
            Kontak
        </a>
    </div>

    <a href="{{ route('login') }}"
       class="btn-login">

        <i class="bi bi-person-lock"></i>

        Admin

    </a>

</nav>

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

                    <div class="footer-logo">

                        <i class="bi bi-bank"></i>

                    </div>

                    <div>

                        <h3>
                            Kelurahan Lubuk Lintang
                        </h3>

                        <p>

                            Website resmi sebagai media informasi,
                            komunikasi dan pelayanan masyarakat
                            Kelurahan Lubuk Lintang.

                        </p>

                    </div>

                </div>

                <div class="footer-social">

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-envelope"></i>
                    </a>

                </div>

            </div>

            <!-- KOLOM 2 -->

            <div class="footer-col">

                <h4>
                    Menu Cepat
                </h4>

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('profil') }}">
                            Profil Kelurahan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('perangkat') }}">
                            Perangkat Kelurahan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dokumentasi') }}">
                            Dokumentasi Kegiatan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kontak') }}">
                            Kontak & Aspirasi
                        </a>
                    </li>

                </ul>

            </div>

            <!-- KOLOM 3 -->

            <div class="footer-col">

                <h4>
                    Jam Pelayanan
                </h4>

                <p>
                    Senin - Jumat
                </p>

                <p>
                    <i class="bi bi-clock"></i>
                    08.00 - 16.00 WIB
                </p>

                <p>
                    Kami siap melayani dengan
                    sepenuh hati dan profesional.
                </p>

            </div>

            <!-- KOLOM 4 -->

            <div class="footer-col">

                <h4>
                    Lokasi Kami
                </h4>

                <iframe
                    src="https://maps.google.com/maps?q=kantor%20lurah%20lubuk%20lintang&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="180"
                    style="border:0;border-radius:12px;"
                    loading="lazy">
                </iframe>

            </div>

        </div>

        <div class="footer-bottom">

            © 2026 Kelurahan Lubuk Lintang

            <br>

            Kelompok 38 KKN UNIB Periode 108

        </div>

    </div>

</footer>

</body>

</html>
