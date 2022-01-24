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

   {{-- Styles --}}
   <link href="{{ asset('css/app.css') }}"
      rel="stylesheet">
   @livewireStyles

</head>

<body class="handheld-toolbar-enabled">
   <main class="page-wrapper">
      <header class="shadow-sm">
         <x-layout.topbar />
         <div class="navbar-sticky bg-light">
            <x-layout.navbar-top />
            <x-layout.navbar-bottom />
         </div>
      </header>
      <div class="content">
         {{ $slot }}
      </div>
   </main>
   <x-layout.footer />

   <a class="btn-scroll-top"
      href="#top"
      data-scroll>
      <i class="btn-scroll-top-icon ci-arrow-up"></i>
   </a>

   {{-- Scripts --}}
   @livewireScripts
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="//unpkg.com/alpinejs"></script>


   @if (!Route::is('login') && !Route::is('register'))
      <x-auth.modal />
      <script>
         const authModal = new bootstrap.Modal(document.querySelector('#auth-modal'));
         const authTab = new bootstrap.Tab(document.querySelector('#auth-tab a[href="#register"]'))
      </script>
      @error('email')
         <script>
            authModal.show();
         </script>
      @enderror
      @if ($errors->has('register_name') || $errors->has('register_email') || $errors->has('register_phone') || $errors->has('register_password')))
         <script>
            authModal.show();
            authTab.show();
         </script>
      @endif
   @endif

</body>

</html>
