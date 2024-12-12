<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&family=Nunito&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>oncoBULB | Plant-Based Cancer Research At Your Fingertips</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @yield('scripts')

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">

    <!-- Your header and navigation links -->
    <nav>
        <!-- Your links for navigation -->
    </nav>

    <!-- Main content -->
    @yield('content')

</body>

</html>
