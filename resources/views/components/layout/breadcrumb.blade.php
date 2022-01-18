@props(['dark' => true, 'activePage'])

<div class="@if (!$dark) bg-secondary py-4 @else page-title-overlap bg-accent pt-4 @endif">
   <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
         <nav aria-label="breadcrumb">
            <ol
               class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start
               @if ($dark) breadcrumb-light @endif">
               <li class="breadcrumb-item">
                  <a class="text-nowrap"
                     href="{{ route('home') }}">
                     <i class="ci-home"></i>{{ __('Home') }}
                  </a>
               </li>
               {{ $slot }}
               <li class="breadcrumb-item text-nowrap active"
                  aria-current="page">{{ $activePage }}</li>
               </li>
            </ol>
         </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
         <h1 class="h3 @if ($dark == 'dark') text-light @endif mb-0">{{ $activePage }}</h1>
      </div>
   </div>
</div>
