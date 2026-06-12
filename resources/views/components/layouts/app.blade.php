<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="x2wW0MnRrMqnYfZ_ldq63Bd4fgw7itAdZdGnB_R-c5I">

    <title>{{ $title ?? 'GolfHill - Premium Property Development' }}</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- DNS prefetch for external resources -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//images.unsplash.com">

    <!-- Fonts — preconnect first, then load non-render-blocking -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"></noscript>

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="min-h-screen bg-gray-50 font-sans antialiased">
    
    <!-- Navigation -->
    <x-navbar />

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281803730325" target="_blank" rel="noopener noreferrer"
       aria-label="Chat on WhatsApp"
       style="position:fixed;bottom:40px;right:40px;z-index:9999;display:flex;align-items:center;justify-content:center;width:56px;height:56px;border-radius:50%;background-color:#25D366;box-shadow:0 4px 16px rgba(0,0,0,0.25);transition:transform 0.2s,box-shadow 0.2s;"
       onmouseover="this.style.transform='scale(1.1)';this.style.boxShadow='0 8px 24px rgba(0,0,0,0.3)';"
       onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.25)';">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="white">
            <path d="M16 2C8.268 2 2 8.268 2 16c0 2.47.666 4.786 1.829 6.77L2 30l7.432-1.795A13.928 13.928 0 0016 30c7.732 0 14-6.268 14-14S23.732 2 16 2zm0 25.5a11.45 11.45 0 01-5.832-1.594l-.418-.249-4.412 1.065 1.096-4.3-.272-.44A11.444 11.444 0 014.5 16C4.5 9.649 9.649 4.5 16 4.5S27.5 9.649 27.5 16 22.351 27.5 16 27.5zm6.29-8.61c-.345-.172-2.04-1.006-2.356-1.12-.316-.115-.546-.172-.775.172-.23.345-.888 1.12-1.089 1.35-.2.23-.4.258-.745.086-.345-.172-1.456-.537-2.773-1.711-1.024-.914-1.716-2.042-1.917-2.387-.2-.345-.021-.531.15-.703.155-.154.345-.402.517-.603.173-.2.23-.345.345-.574.115-.23.058-.431-.029-.603-.086-.172-.775-1.868-1.062-2.558-.28-.672-.564-.58-.775-.591l-.66-.012c-.23 0-.603.086-.918.431-.316.345-1.205 1.178-1.205 2.872s1.233 3.33 1.405 3.56c.172.23 2.428 3.71 5.882 5.204.822.355 1.464.567 1.964.726.825.263 1.576.226 2.169.137.661-.099 2.04-.834 2.328-1.638.287-.804.287-1.493.2-1.638-.086-.144-.316-.23-.66-.402z"/>
        </svg>
    </a>

    @stack('scripts')
</body>
</html>
