<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link rel="stylesheet"
          href="{{ asset('css/login.css') }}">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-header">

            <div class="icon-box">
                <i class="bi bi-bank"></i>
            </div>

            <h2>Admin Kelurahan</h2>

            <p>
                Sistem Informasi Kelurahan
                Lubuk Lintang
            </p>

        </div>

        @if(session('error'))

        <div class="alert-error">
            {{ session('error') }}
        </div>

        @endif

        <form
            action="{{ route('login.process') }}"
            method="POST">

            @csrf

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email admin"
                    required>

            </div>

            <div class="form-group">

                <label>Password</label>

                <div class="password-box">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required>

                    <button
                        type="button"
                        onclick="togglePassword()">

                        <i
                            id="eyeIcon"
                            class="bi bi-eye">
                        </i>

                    </button>

                </div>

            </div>

            <button
                type="submit"
                class="btn-login">

                Login Admin

            </button>

        </form>

        <div class="login-footer">

            <p>
                © 2026 Kelurahan Lubuk Lintang
            </p>

            <small>
                Dikembangkan oleh
                Fidia Dewi Wulandari Batu Bara
                • KKN Universitas Bengkulu 2026
            </small>

        </div>

    </div>

</div>

<script>

function togglePassword()
{
    let password =
        document.getElementById('password');

    let icon =
        document.getElementById('eyeIcon');

    if(password.type === 'password')
    {
        password.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    }
    else
    {
        password.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}

</script>

</body>

</html>