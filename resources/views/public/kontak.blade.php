@extends('public.layouts.app')

@section('title','Kontak & Aspirasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/kontakweb.css') }}">
@endsection

@section('content')

{{-- ============================
     HERO
============================= --}}

<section class="kontak-hero">

    {{-- Ilustrasi gedung kiri --}}
    <div class="kontak-hero-deco kontak-hero-deco--left" aria-hidden="true">
        <svg viewBox="0 0 220 340" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="10" y="80" width="60" height="260" rx="4" stroke="#b8cef0" stroke-width="2" fill="none"/>
            <rect x="20" y="95" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="40" y="95" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="20" y="120" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="40" y="120" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="20" y="145" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="40" y="145" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="20" y="170" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="40" y="170" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="20" y="195" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="40" y="195" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="25" y="310" width="30" height="30" rx="2" fill="#d1e0f7"/>
            <rect x="80" y="130" width="45" height="210" rx="4" stroke="#b8cef0" stroke-width="2" fill="none"/>
            <rect x="88" y="143" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="105" y="143" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="88" y="165" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="105" y="165" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="88" y="187" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="105" y="187" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="88" y="209" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="105" y="209" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="92" y="295" width="20" height="45" rx="2" fill="#d1e0f7"/>
            <rect x="140" y="50" width="70" height="290" rx="4" stroke="#b8cef0" stroke-width="2" fill="none"/>
            <rect x="148" y="64" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="168" y="64" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="188" y="64" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="148" y="88" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="168" y="88" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="188" y="88" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="148" y="112" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="168" y="112" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="148" y="136" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="168" y="136" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="148" y="160" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="168" y="160" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="155" y="300" width="40" height="40" rx="2" fill="#d1e0f7"/>
            <line x1="0" y1="339" x2="220" y2="339" stroke="#b8cef0" stroke-width="2"/>
        </svg>
    </div>

    {{-- Ilustrasi gedung kanan --}}
    <div class="kontak-hero-deco kontak-hero-deco--right" aria-hidden="true">
        <svg viewBox="0 0 220 340" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0" y="50" width="70" height="290" rx="4" stroke="#b8cef0" stroke-width="2" fill="none"/>
            <rect x="8" y="64" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="28" y="64" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="48" y="64" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="8" y="88" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="28" y="88" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="48" y="88" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="8" y="112" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="28" y="112" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="8" y="136" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="28" y="136" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="8" y="160" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="28" y="160" width="12" height="14" rx="1" fill="#d1e0f7"/>
            <rect x="20" y="300" width="40" height="40" rx="2" fill="#d1e0f7"/>
            <rect x="85" y="130" width="45" height="210" rx="4" stroke="#b8cef0" stroke-width="2" fill="none"/>
            <rect x="93" y="143" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="110" y="143" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="93" y="165" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="110" y="165" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="93" y="187" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="110" y="187" width="10" height="12" rx="1" fill="#d1e0f7"/>
            <rect x="97" y="295" width="20" height="45" rx="2" fill="#d1e0f7"/>
            <rect x="150" y="80" width="60" height="260" rx="4" stroke="#b8cef0" stroke-width="2" fill="none"/>
            <rect x="158" y="95" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="178" y="95" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="158" y="120" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="178" y="120" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="158" y="145" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="178" y="145" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="158" y="170" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="178" y="170" width="12" height="14" rx="2" fill="#d1e0f7"/>
            <rect x="165" y="310" width="30" height="30" rx="2" fill="#d1e0f7"/>
            <line x1="0" y1="339" x2="220" y2="339" stroke="#b8cef0" stroke-width="2"/>
        </svg>
    </div>

    <div class="container kontak-hero-inner">

        <span class="kontak-badge">HUBUNGI KAMI</span>

        <h1>
            Bantuan &amp; Layanan<br>
            Aspirasi Masyarakat
        </h1>

        <p>
            Kami siap menerima aspirasi, kritik, saran dan pengaduan<br>
            dari masyarakat Kelurahan {{ $profil->nama_kelurahan ?? 'Lubuk Lintang' }}.
        </p>

    </div>

</section>

{{-- ============================
     INFO KANTOR + PETA
============================= --}}

<section class="kontak-info-section">

    <div class="container">

        <div class="kontak-info-grid">

            {{-- Info Card --}}
            <div class="info-card">

                <h3>Informasi Kantor</h3>

                <div class="info-item">
                    <div class="info-icon" style="background:#EFF6FF;">
                        <i class="bi bi-geo-alt-fill" style="color:#2563EB;"></i>
                    </div>
                    <div class="info-text">
                        <strong>Alamat</strong>
                        <p>{{ $profil->alamat ?? '-' }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon" style="background:#EFF6FF;">
                        <i class="bi bi-telephone-fill" style="color:#2563EB;"></i>
                    </div>
                    <div class="info-text">
                        <strong>Telepon</strong>
                        <p>{{ $profil->telepon ?? '-' }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon" style="background:#EFF6FF;">
                        <i class="bi bi-envelope-fill" style="color:#2563EB;"></i>
                    </div>
                    <div class="info-text">
                        <strong>Email</strong>
                        <p>{{ $profil->email ?? '-' }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon" style="background:#EFF6FF;">
                        <i class="bi bi-clock-fill" style="color:#2563EB;"></i>
                    </div>
                    <div class="info-text">
                        <strong>Jam Pelayanan</strong>
                        <p>Senin - Jumat<br>08.00 - 16.00 WIB</p>
                        <span class="badge-libur">Hari libur nasional tutup</span>
                    </div>
                </div>

            </div>

            {{-- Peta --}}
            <div class="map-card">
                @if(!empty($profil->maps_embed))
                    <iframe
                        src="{{ $profil->maps_embed }}"
                        width="100%"
                        height="100%"
                        style="border:0;border-radius:20px;min-height:420px;"
                        loading="lazy"
                        allowfullscreen>
                    </iframe>
                @else
                    <iframe
                        src="https://maps.google.com/maps?q=kantor%20lurah%20lubuk%20lintang&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%"
                        height="100%"
                        style="border:0;border-radius:20px;min-height:420px;"
                        loading="lazy"
                        allowfullscreen>
                    </iframe>
                @endif
            </div>

        </div>

    </div>

</section>

{{-- ============================
     FORM ASPIRASI
============================= --}}

<section class="aspirasi-section">

    <div class="container">

        @if(session('success'))
        <div class="success-alert">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="aspirasi-card">

            {{-- Kiri: ilustrasi + info --}}
            <div class="aspirasi-left">

                {{-- Ilustrasi amplop SVG --}}
                <div class="aspirasi-ilustrasi" aria-hidden="true">
                    <svg viewBox="0 0 200 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" y="60" width="140" height="90" rx="12" fill="#EFF6FF" stroke="#BFDBFE" stroke-width="2"/>
                        <path d="M20 72 L90 112 L160 72" stroke="#BFDBFE" stroke-width="2" fill="none"/>
                        <rect x="50" y="20" width="80" height="60" rx="10" fill="#2563EB" opacity=".12"/>
                        <circle cx="90" cy="52" r="28" fill="#2563EB" opacity=".08"/>
                        <path d="M78 52 Q82 40 90 52 Q98 64 106 52" stroke="#2563EB" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        <circle cx="140" cy="110" r="18" fill="#ECFDF5"/>
                        <path d="M133 110 L137 114 L147 104" stroke="#059669" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="40" cy="80" r="10" fill="#EFF6FF" stroke="#BFDBFE" stroke-width="1.5"/>
                        <path d="M36 80 Q40 76 44 80" stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" fill="none"/>
                        <circle cx="50" cy="130" r="6" fill="#FEF3C7"/>
                        <circle cx="160" cy="70" r="8" fill="#F5F3FF"/>
                    </svg>
                </div>

                <h2>Sampaikan<br>Aspirasi Anda</h2>

                <p>
                    Isi formulir di samping untuk
                    menyampaikan aspirasi, kritik,
                    saran atau pengaduan kepada
                    pemerintah kelurahan.
                </p>

                <div class="info-wa">
                    <div class="info-wa-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <p>
                        Admin akan menanggapi aspirasi Anda melalui WhatsApp.
                    </p>
                </div>

            </div>

            {{-- Kanan: form --}}
            <div class="aspirasi-right">

                <form action="{{ route('kirim.aspirasi') }}" method="POST" novalidate>

                    @csrf

                    <div class="form-row-2">

                        <div class="form-group">
                            <label for="nama">
                                Nama Lengkap <span class="req">*</span>
                            </label>
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('nama') }}"
                                required>
                            @error('nama')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">
                                Nomor HP <span class="req">*</span>
                            </label>
                            <input
                                type="tel"
                                id="no_hp"
                                name="no_hp"
                                placeholder="Masukkan nomor HP aktif"
                                value="{{ old('no_hp') }}"
                                required>
                            @error('no_hp')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="subjek">
                            Subjek <span class="req">*</span>
                        </label>
                        <div class="select-wrapper">
                            <select id="subjek" name="subjek" required>
                                <option value="" disabled {{ old('subjek') ? '' : 'selected' }}>Pilih atau tulis subjek</option>
                                <option value="Aspirasi Warga" {{ old('subjek') == 'Aspirasi Warga' ? 'selected' : '' }}>Aspirasi Warga</option>
                                <option value="Kritik & Saran" {{ old('subjek') == 'Kritik & Saran' ? 'selected' : '' }}>Kritik &amp; Saran</option>
                                <option value="Pengaduan" {{ old('subjek') == 'Pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                                <option value="Pertanyaan" {{ old('subjek') == 'Pertanyaan' ? 'selected' : '' }}>Pertanyaan</option>
                                <option value="Permohonan Layanan" {{ old('subjek') == 'Permohonan Layanan' ? 'selected' : '' }}>Permohonan Layanan</option>
                                <option value="Lainnya" {{ old('subjek') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <i class="bi bi-chevron-down select-arrow"></i>
                        </div>
                        @error('subjek')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pesan">
                            Pesan <span class="req">*</span>
                        </label>
                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="5"
                            placeholder="Tulis pesan Anda di sini..."
                            required>{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn-kirim">
                        <i class="bi bi-send-fill"></i>
                        Kirim Aspirasi
                    </button>

                    <p class="form-note">
                        <i class="bi bi-lock-fill"></i>
                        Data Anda aman dan hanya digunakan untuk keperluan pengaduan dan layanan masyarakat.
                    </p>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection