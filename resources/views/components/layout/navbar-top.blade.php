<div class="navbar navbar-expand-lg navbar-light">
   <div class="container">
      <a class="navbar-brand d-none d-sm-block flex-shrink-0"
         href="{{ route('home') }}"><img src="/storage/theme/logo-dark.png"
            width="142"
            alt="Cartzilla"></a><a class="navbar-brand d-sm-none flex-shrink-0 me-2"
         href="{{ route('home') }}"><img src="/storage/theme/logo-icon.png"
            width="74"
            alt="Cartzilla">
      </a>
      <div class="d-none d-lg-block flex-grow-1">
         <x-products.search />
      </div>
      <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center ms-5">
         <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
            class="navbar-tool navbar-stuck-toggler"
            href="#">
            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i>
            </div>
         </a>
         <div class="account navbar-tool dropdown ms-1 ms-lg-0 me-n1 me-lg-2">
            <a class="d-flex align-items-center"
               href="{{ auth()->check() ? route('account.index') : route('login') }}">
               <div class="navbar-tool-icon-box">
                  <i class="navbar-tool-icon ci-user"></i>
               </div>
               <div class="navbar-tool-text dropdown-toggle ms-n3">
                  <small>
                     @auth
                        {{ __('Hello') }}, {{ auth()->user()->name }}
                     @else
                        {{ __('Hello, There') }}
                     @endauth
                  </small>
                  @auth {{ __('Account') }} @else {{ __('Login') }} @endauth

               </div>
            </a>
            @auth
               <div class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item"
                        href="{{ route('account.index') }}">{{ __('Account') }}</a>
                  </li>
                  <li>
                     <a href="#"
                        class="dropdown-item"
                        onclick="event.preventDefault(); document.querySelector('.logout-form').submit();">{{ __('Log out') }}</a>
                     <form class="logout-form"
                        action="{{ route('logout') }}"
                        method="post">
                        @csrf</form>
                  </li>
               </div>
            @else
               <div class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
               </div>
            @endauth
         </div>
         <livewire:cart.dropdown />
      </div>
   </div>
</div>
