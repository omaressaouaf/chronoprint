<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    {{-- SEO Meta Tags --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
          content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords"
          content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author"
          content="Createx Studio">

    {{-- CSRF Token --}}
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"
            defer></script>

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
</head>

<body class="handheld-toolbar-enabled">
    <main class="page-wrapper">
        <header class="shadow-sm">

            @include('partials.layout.topbar')

            @include('partials.layout.navbar')
        </header>
        <div class="content">
            @yield('content')
        </div>

    </main>
    @include('partials.layout.footer')

    @include('partials.layout.toolbar')

    <a class="btn-scroll-top"
       href="#top"
       data-scroll>
        <i class="btn-scroll-top-icon ci-arrow-up"></i>
    </a>
</body>

</html>
