<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Kelurahan')
    </title>

    {{-- CSS GLOBAL --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    {{-- CSS PER HALAMAN --}}
    @yield('styles')

    {{-- BOOTSTRAP ICON --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    @include('admin.layouts.sidebar')

    <div class="main-content">

        @include('admin.layouts.navbar')

        <div class="content">

            @yield('content')

        </div>

    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>

</body>

</html>