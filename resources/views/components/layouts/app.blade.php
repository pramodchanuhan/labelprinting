<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <title>Label Printing </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-layouts.header />
    @yield('page-level-style')

</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <x-layouts.navbar />

        <x-layouts.sidebar />

        {{ $slot }}


    </div>
    <!-- /Main Wrapper -->

    {{-- <x-layouts.footer /> --}}
    @include('components.layouts.footer')
    @yield('page-level-script')

    <x-flash-message />
</body>

</html>
