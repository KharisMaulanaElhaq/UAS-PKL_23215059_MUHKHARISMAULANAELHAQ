<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Auth') | {{ config('app.name') }}</title>

    <x-favicon />
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-logos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/tabler-icons/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>

<body style="background-image: url('{{ asset('assets/images/landing/bg-regis.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5 px-3">
        <div class="card border-0 shadow-sm" style="max-width: 460px; width: 100%;">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <a href="{{ url('/') }}" class="d-inline-block text-decoration-none">
                        <x-brand-logos size="lg" />
                    </a>
                    <p class="text-muted small mt-3 mb-0">Sistem Pakar Diagnosa Penyakit &amp; Hama Tanaman Jagung</p>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/landing.js') }}" type="module"></script>
    @stack('scripts')
</body>

</html>
