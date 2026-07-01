<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin | Kelurahan Lubuk Lintang</title>

    <link rel="stylesheet"
          href="{{ asset('css/login.css') }}">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<div class="login-wrapper">

    <!-- Background Circles -->
    <div class="bg-circle circle-1"></div>
    <div class="bg-circle circle-2"></div>

    <!-- Tombol Kembali -->
    <a href="{{ route('home') }}" class="back-home">
        <i class="bi bi-arrow-left"></i>
        <span>Kembali ke Website</span>
    </a>

    <div class="login-container">

        <!-- ==============================
             LEFT PANEL
        =============================== -->
        <section class="left-panel">

            <img
                src="{{ asset('images/kantor-kelurahan.jpg') }}"
                class="left-bg"
                alt="Kantor Kelurahan">

            <div class="left-overlay"></div>

            <!-- Wave decorative bottom -->
            <div class="left-wave"></div>

            <div class="left-content">

                <span class="subtitle">
                    <i class="bi bi-bank2"></i>
                    WEBSITE RESMI
                </span>

                <h1>
                    Kelurahan<br>
                    Lubuk Lintang
                </h1>

                <p>
                    Portal pelayanan publik berbasis digital
                    yang memberikan akses informasi,
                    pelayanan administrasi, transparansi,
                    serta komunikasi masyarakat secara
                    cepat, aman dan profesional.
                </p>

            </div>

            <div class="left-feature">

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h4>Pelayanan</h4>
                        <span>Profesional</span>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <h4>Transparan</h4>
                        <span>Akuntabel</span>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div>
                        <h4>Melayani</h4>
                        <span>Sepenuh Hati</span>
                    </div>
                </div>

            </div>

            <!-- Bottom security badge -->
            <div class="left-security">
                <i class="bi bi-shield-lock-fill"></i>
                <span>Sistem aman dan terpercaya untuk melindungi data Anda</span>
            </div>

            <!-- Decorative dots -->
            <div class="dots-pattern"></div>

        </section>

        <!-- ==============================
             RIGHT PANEL
        =============================== -->
        <section class="right-panel">

            <div class="login-card">

                <div class="card-header">

                    <div class="logo-box">
                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Logo Kelurahan Lubuk Lintang">
                    </div>

                    <h2>Admin Kelurahan</h2>

                    <p>
                        Silakan masuk menggunakan akun
                        administrator untuk mengelola
                        Website Kelurahan Lubuk Lintang.
                    </p>

                </div>

                @if(session('error'))
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session('error') }}
                </div>
                @endif

                <form
                    action="{{ route('login.process') }}"
                    method="POST">

                    @csrf

                    <div class="form-group">

                        <label for="email">Email</label>

                        <div class="input-group">
                            <i class="bi bi-envelope" aria-hidden="true"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="admin@gmail.com"
                                required>
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="password">Password</label>

                        <div class="input-group password-group">
                            <i class="bi bi-lock" aria-hidden="true"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                required>
                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword()"
                                aria-label="Tampilkan password">
                                <i id="eyeIcon" class="bi bi-eye"></i>
                            </button>
                        </div>

                    </div>

                    <button type="submit" class="btn-login">
                        <i class="bi bi-lock-fill"></i>
                        Login Admin
                    </button>

                </form>

                <div class="login-divider">
                    <span class="line"></span>
                    <span class="text">atau</span>
                    <span class="line"></span>
                </div>

                <div class="login-info">

                    <div class="info-row">
                        <i class="bi bi-patch-check-fill"></i>
                        <span>Sistem hanya dapat diakses oleh Administrator Kelurahan.</span>
                    </div>

                </div>

                <div class="login-footer">
                    <p>© 2026 Kelurahan Lubuk Lintang</p>
                    <small>Website Resmi Pemerintah Kelurahan Lubuk Lintang</small>
                </div>

            </div>

        </section>

    </div>

</div>

<script>

function togglePassword() {
    const password = document.getElementById('password');
    const eye = document.getElementById('eyeIcon');
    if (password.type === 'password') {
        password.type = 'text';
        eye.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        password.type = 'password';
        eye.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

document.querySelectorAll('.input-group input').forEach(input => {
    input.addEventListener('focus', function () {
        this.closest('.input-group').classList.add('active');
    });
    input.addEventListener('blur', function () {
        this.closest('.input-group').classList.remove('active');
    });
});

</script>

</body>
</html>