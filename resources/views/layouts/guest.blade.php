<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KamiBantu</title>

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- FULL PAGE BACKGROUND -->
    <div
        class="min-h-screen bg-cover bg-center relative"
        style="background-image: url({{ 'images/volunteer_5.jpg' }});"
    >
        <!-- Overlay -->
        <div class="absolute inset-0 bg-green-900/60"></div>

        <!-- CONTENT -->
        <div class="relative z-10 min-h-screen flex items-center justify-center px-4">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
