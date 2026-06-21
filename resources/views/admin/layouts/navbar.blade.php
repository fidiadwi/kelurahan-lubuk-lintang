<div class="navbar">

    <div class="navbar-left">

        <button id="toggleSidebar" class="toggle-btn">
            <i class="bi bi-list"></i>
        </button>

        <h2 class="page-title">
            @yield('title')
        </h2>

    </div>

    <div class="navbar-right">

        <div class="notif-box">

            <i class="bi bi-bell"></i>

            @if(isset($notifCount) && $notifCount > 0)
                <span>{{ $notifCount }}</span>
            @endif

        </div>

        <div class="date-box">

            <h4>
                {{ now()->locale('id')->translatedFormat('l, d F Y') }}
            </h4>

            <p>
                Admin :
                {{ auth()->user()->name ?? 'Administrator' }}
            </p>

        </div>

        <div class="avatar">

            {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}

        </div>

    </div>

</div>