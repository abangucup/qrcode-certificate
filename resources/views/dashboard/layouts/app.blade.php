<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('dashboard.layouts.style')
    @stack('style')
    <title>@yield('title')</title>
</head>

<body>

    @include('sweetalert::alert')
    <div class="page">

        <div class="page-wrapper">

            @include('dashboard.layouts.header')

            @yield('content')

            @include('dashboard.layouts.footer')

        </div>
    </div>

    @include('dashboard.layouts.script')
    @stack('script')

</body>

</html>