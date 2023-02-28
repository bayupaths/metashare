<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Icon Logo Metashare --}}
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/logo-metashare-small.png">

    @stack('prepend-style')
    @include('includes.admin.style')
    @stack('addon-style')

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('includes.admin.header')
        @include('includes.admin.sidebar')
        <div class="page-wrapper">
            @yield('content')
            @include('includes.admin.footer')
        </div>
    </div>

    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')
</body>

</html>
