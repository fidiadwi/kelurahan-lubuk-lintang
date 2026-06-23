<div class="sidebar">

    <div class="sidebar-header">

        <div class="logo-box">
            <i class="bi bi-bank"></i>
        </div>

        <div class="logo-text">
            <h3>Admin Kelurahan</h3>
            <span>Lubuk Lintang</span>
        </div>

    </div>

    <div class="menu">

        <a href="{{ url('/admin/dashboard') }}"
        class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.laporan') }}"
        class="menu-item {{ request()->is('admin/laporan') ? 'active' : '' }}">
            <i class="bi bi-envelope-paper"></i>
            <span>Laporan & Pesan</span>
        </a>

       <a href="{{ route('admin.profil') }}"
        class="menu-item {{ request()->is('admin/profil') ? 'active' : '' }}">
            <i class="bi bi-building"></i>
            <span>Profil Kelurahan</span>
        </a>

        <a href="{{ route('admin.perangkat') }}"
        class="menu-item {{ request()->is('admin/perangkat') ? 'active' : '' }}">
            <i class="bi bi-people"></i>
            <span>Perangkat Kelurahan</span>
        </a>

        <a href="{{ route('admin.galeri') }}"
        class="menu-item {{ request()->is('admin/galeri') ? 'active' : '' }}">
            <i class="bi bi-images"></i>
            <span>Galeri Dokumentasi</span>
        </a>

        <a href="{{ route('admin.pengaturan') }}"
        class="menu-item {{ request()->is('admin/pengaturan') ? 'active' : '' }}">
            <i class="bi bi-gear"></i>
            <span>Pengaturan Akun</span>
        </a>

    </div>

   <div class="sidebar-footer">
        <form action="{{ route('logout') }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="logout-btn">

                <i class="bi bi-box-arrow-right"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</div>