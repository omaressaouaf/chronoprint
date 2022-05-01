<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"
   dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible"
      content="IE=edge">
   <meta name="robots"
      content="none" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta name="description"
      content="admin login">
   <title>
      @hasSection('title')
         @yield('page_title') - {{ config('app.name') }} Admin
      @else
         Connexion - {{ config('app.name') }} Admin
      @endif
   </title>
   <link rel="stylesheet"
      href="{{ voyager_asset('css/app.css') }}">
   @if (__('voyager::generic.is_rtl') == 'true')
      <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
      <link rel="stylesheet"
         href="{{ voyager_asset('css/rtl.css') }}">
   @endif
   <style>
      body {
         background-image: url('{{ Voyager::image(Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg')) }}');
         background-color: {{ Voyager::setting('admin.bg_color', '#FFFFFF') }};
      }

      body.login .login-sidebar {
         border-top: 5px solid {{ config('voyager.primary_color', '#22A7F0') }};
      }

      @media (max-width: 767px) {
         body.login .login-sidebar {
            border-top: 0px !important;
            border-left: 5px solid {{ config('voyager.primary_color', '#22A7F0') }};
         }
      }

      body.login .form-group-default.focused {
         border-color: {{ config('voyager.primary_color', '#22A7F0') }};
      }

      .login-button,
      .bar:before,
      .bar:after {
         background: {{ config('voyager.primary_color', '#22A7F0') }};
      }

      .remember-me-text {
         padding: 0 5px;
      }

   </style>

   @yield('pre_css')
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
      rel="stylesheet">

   {{-- Favicons --}}
   <link rel="apple-touch-icon"
      sizes="152x152"
      href="{{ asset('/theme-images/favicons/apple-touch-icon.png') }}">
   <link rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset('/theme-images/favicons/favicon-32x32.png') }}">
   <link rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('/theme-images/favicons/favicon-16x16.png') }}">
   <link rel="manifest"
      href="{{ asset('/theme-images/favicons/site.webmanifest') }}">
   <link rel="mask-icon"
      href="{{ asset('/theme-images/favicons/safari-pinned-tab.svg') }}"
      color="#5bbad5">
   <meta name="msapplication-TileColor"
      content="#da532c">
   <meta name="theme-color"
      content="#ffffff">
</head>

<body class="login">
   <div class="container-fluid">
      <div class="row">
         <div class="faded-bg animated"></div>
         <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
               <div class="col-sm-12 col-md-10 col-md-offset-2">
                  <div class="logo-title-container">
                     <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn"
                        src="/theme-images/icon-light.png"
                        alt="Logo Icon">
                     <div class="copy animated fadeIn">
                        <h1>{{ config('app.name') }}</h1>
                        <p>Bienvenue à l'administration de {{ config('app.name') }}</p>
                     </div>
                  </div> <!-- .logo-title-container -->
               </div>
            </div>
         </div>

         <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            @yield('content')

         </div> <!-- .login-sidebar -->
      </div> <!-- .row -->
   </div> <!-- .container-fluid -->
   @yield('post_js')
</body>

</html>
