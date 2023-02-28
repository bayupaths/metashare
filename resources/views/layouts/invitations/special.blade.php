<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/invitations/icons/app/favicon.ico">

    @stack('prepend-styles')
    @vite('resources/css/app.css')
    <!-- Tailwind Elements -->
    <link href="/vendor/magnify-master/docs/css/jquery.magnify.css" rel="stylesheet" />
    <link href="/vendor/magnify-master/docs/css/magnify-white-theme.css" rel="stylesheet" />
    <link href="/vendor/magnify-master/docs/css/docs.css" rel="stylesheet">
    <!-- AOS -->
    <link href="/vendor/aos/dist/aos.css" rel="stylesheet">
    {{-- Load Font --}}
    <link rel="stylesheet" href="/invitations/styles/special-style.css">
    @stack('addon-styles')

    <title>@yield('title')</title>


</head>

<body class="font-Montserrat bg-[#ebeeee]">

    @yield('content')

    @stack('prepend-scripts')
    {{--  All Jquery --}}
    <script src="/vendor/jquery/dist/jquery.min.js"></script>
    {{-- Tailwind Elements --}}
    <script src="/vendor/tw-elements/dist/js/index.min.js"></script>
    <script src="/vendor/magnify-master/docs/js/jquery.magnify.js"></script>
    <script src="/vendor/aos/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('addon-scripts')

</body>

</html>
