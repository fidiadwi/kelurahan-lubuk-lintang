@extends('admin.layouts.app')

@section('title','Pengaturan Akun')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pengaturan.css') }}">
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

<div class="setting-card">

    <div class="setting-header">

        <h2>Pengaturan Akun</h2>

        <p>
            Kelola informasi akun administrator
        </p>

    </div>

    <form
        action="{{ route('admin.password.update') }}"
        method="POST">

        @csrf

        <div class="form-group">

            <label>Nama Admin</label>

            <input
                type="text"
                name="name"
                value="{{ $user->name }}"
                required>

        </div>

        <div class="form-group">

            <label>Email Admin</label>

            <input
                type="email"
                name="email"
                value="{{ $user->email }}"
                required>

        </div>

        <hr class="divider">

        <h3 class="section-title">
            Ganti Password
        </h3>

        <div class="form-group">

            <label>Password Lama</label>

            <div class="password-box">

                <input
                    type="password"
                    name="password_lama"
                    id="password_lama"
                    required>

                <button
                    type="button"
                    onclick="togglePassword('password_lama')">

                    <i class="bi bi-eye"></i>

                </button>

            </div>

        </div>

        <div class="form-group">

            <label>Password Baru</label>

            <div class="password-box">

                <input
                    type="password"
                    name="password_baru"
                    id="password_baru">

                <button
                    type="button"
                    onclick="togglePassword('password_baru')">

                    <i class="bi bi-eye"></i>

                </button>

            </div>

        </div>

        <div class="form-group">

            <label>Konfirmasi Password Baru</label>

            <div class="password-box">

                <input
                    type="password"
                    name="password_baru_confirmation"
                    id="password_baru_confirmation">

                <button
                    type="button"
                    onclick="togglePassword('password_baru_confirmation')">

                    <i class="bi bi-eye"></i>

                </button>

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

<script>

function togglePassword(id)
{
    let input = document.getElementById(id);

    if(input.type === 'password')
    {
        input.type = 'text';
    }
    else
    {
        input.type = 'password';
    }
}

</script>

@endsection