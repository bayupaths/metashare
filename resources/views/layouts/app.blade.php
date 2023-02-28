<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ url('icons/logo-metashare-small.png') }}">

    @vite('resources/css/app.css')
    {{-- @vite('resources/js/app.js') --}}
    {{-- <link rel="stylesheet" href="{{ url('style/app.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ url('style/style-marketplace.css') }}"> --}}
    {{-- @stack('prepend-style')
    @include('includes.app.styles')
    @stack('addon-style') --}}

</head>

<body
    class="bg-cover bg-mp-primary-sm font-PrimaryPoppins tracking-wide text-slate-700 flex flex-col justify-between overflow-auto scrollbar-hide xl:overflow-scroll xl:scrollbar-show">

    <header class="h-full">
        @include('includes.app.navbar')
    </header>


    <main
        class="px-5 pt-4 pb-16 sm:px-8 md:px-14 md:pt-10 lg:px-16 xl:px-20 xl:pb-28 text-xs xl:text-sm  min-h-[70vh] max-h-full text-[#1C2D46]">
        @yield('content')
    </main>

    <footer class="text-base-1xs xl:text-xs xl:text-base-xs">
        @include('includes.app.footer')
    </footer>


    @stack('prepend-script')
    @include('includes.app.script')
    @stack('addon-script')
</body>

</html>
