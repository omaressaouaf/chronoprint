<x-app-layout>
   <x-layout.breadcrumb :active-page="__($activePage ? $activePage : 'Account')">
      @if ($activePage)
         <li class="breadcrumb-item text-nowrap">
            <a href="{{ route('account.index') }}">
               {{ __('Account') }}
            </a>
         </li>
      @endif
   </x-layout.breadcrumb>

   <div class="container pb-5 mb-2 mb-md-4">
      <div class="row">
         <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
            <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
               <div
                  class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
                  <div class="d-md-flex align-items-center">
                     <div
                        class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0"
                        style="width: 6.375rem;">
                        <img class="rounded-circle"
                           src="/storage/{{ auth()->user()->avatar }}"
                           alt="Susan Gardner">
                     </div>
                     <div class="ps-md-3">
                        <h3 class="fs-base mb-0">{{ auth()->user()->name }}</h3><span
                           class="text-accent fs-sm">{{ auth()->user()->email }}</span>
                     </div>
                  </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0"
                     href="#account-menu"
                     data-bs-toggle="collapse"
                     aria-expanded="false"><i
                        class="ci-menu me-2"></i>{{ __('Account menu') }}</a>
               </div>
               <div class="d-lg-block collapse"
                  id="account-menu">
                  <div class="bg-secondary px-4 py-3">
                     <h3 class="fs-sm mb-0 text-muted">{{ __('Dashboard') }}</h3>
                  </div>
                  <ul class="list-unstyled mb-0">
                     <li class="border-bottom mb-0">
                        <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->is('account') ? 'active' : '' }}"
                           href="{{ route('account.index') }}">
                           <i class="ci-bag opacity-60 me-2"></i>{{ __('Orders') }}
                           <span class="fs-sm text-muted ms-auto">1</span></a>
                     </li>
                  </ul>
                  <div class="bg-secondary px-4 py-3">
                     <h3 class="fs-sm mb-0 text-muted">{{ __('Account settings') }}</h3>
                  </div>
                  <ul class="list-unstyled mb-0">
                     <li class="border-bottom mb-0">
                        <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->is('account/profile') ? 'active' : '' }}"
                           href="{{ route('account.profile') }}">
                           <i class="ci-user opacity-60 me-2"></i>{{ __('Profile') }}
                        </a>
                     </li>
                     <li class="border-bottom mb-0">
                        <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->is('account/addresses') ? 'active' : '' }}"
                           href="{{ route('account.addresses') }}">
                           <i class="ci-location opacity-60 me-2"></i>{{ __('Addresses') }}
                        </a>
                     </li>
                     <li class="mb-0">
                        <a class="nav-link-style d-flex align-items-center px-4 py-3 {{ request()->is('account/password') ? 'active' : '' }}"
                           href="{{ route('account.password') }}">
                           <i class="ci-locked opacity-60 me-2"></i>{{ __('Password') }}
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </aside>
         <section class="col-lg-8">
            <div
               class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
               @if ($title)
                  <h6 class="fs-base text-light mb-0">{{ $title }}</h6>
               @endif
               <form action="{{ route('logout') }}"
                  method="POST">
                  @csrf
                  <button type="submit"
                     class="btn btn-primary btn-sm">
                     <i class="ci-sign-out me-2"></i>{{ __('Log out') }}
                  </button>
               </form>
            </div>
            <x-base.alerts />

            {{ $slot }}
         </section>
      </div>
   </div>
</x-app-layout>
