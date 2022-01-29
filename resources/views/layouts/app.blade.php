<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport"
      content="width=device-width, initial-scale=1">

   {{-- SEO --}}
   <title>
      {{ $constructedTitle }}
   </title>
   <meta content="{{ $description }}"
      name="description">
   <meta name="author"
      content="{{ config('app.name') }}">
   <link rel="canonical"
      href="{{ $canonical }}" />
   <meta property="og:locale"
      content="{{ str_replace('_', '-', app()->getLocale()) }}" />
   <meta property="og:type"
      content="article" />
   <meta property="og:title"
      content="{{ $constructedTitle }}" />
   <meta property="og:description"
      content="{{ $description }}" />
   @if (setting('site.logo'))
      <meta property="og:image"
         content="/storage/{{ setting('site.logo') }}" />
   @endif
   <meta property="og:url"
      content="{{ $canonical }}" />
   <meta name="twitter:card"
      content="summary_large_image" />
   <meta property="og:site_name"
      content="{{ config('app.name') }}" />
   <meta name="twitter:image:alt"
      content="{{ config('app.name') }} Logo" />
   <meta name="keywords"
      content="{{ $keywords }}" />
   <meta name="google-site-verification"
      content="google verification here" />
   <script type="application/ld+json">
      {
         "@context": "https://schema.org",
         "@type": "LocalBusiness",
         "name": "{{ config('app.name') }}",
         "image": "/storage/{{ setting('site.logo') }}",
         "@id": "https://mr-print.ma/",
         "url": "https://mr-print.ma/",
         "telephone": "{{ setting('site.phone') }}",
         "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ setting('site.address') }}",
            "addressLocality": "Casablanca",
            "postalCode": "",
            "addressCountry": "MA"
         }
      }
   </script>

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
   <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100">
         <a class="d-table-cell handheld-toolbar-item"
            href="javascript:void(0)"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            onclick="window.scrollTo(0, 0)">
            <span class="handheld-toolbar-icon">
               <i class="ci-menu"></i>
            </span>
            <span class="handheld-toolbar-label">{{ __('Menu') }}</span>
         </a>
         <a class="d-table-cell handheld-toolbar-item"
            href="{{ route('account.orders') }}">
            <span class="handheld-toolbar-icon">
               <i class="ci-user"></i>
            </span>
            <span class="handheld-toolbar-label">{{ __('Account') }}</span>
         </a>
      </div>
   </div>

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
