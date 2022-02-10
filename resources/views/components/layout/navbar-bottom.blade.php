<div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
   <div class="container">
      <div class="collapse navbar-collapse"
         id="navbarCollapse">
         <div class="d-flex d-lg-none">
            <x-products.search class="rounded" />
         </div>

         {{-- All categories- --}}
         <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle ps-lg-0"
                  href="{{ route('categories.show', ['slug' => 'all']) }}"
                  data-bs-toggle="dropdown"><i
                     class="ci-menu me-2"></i>{{ __('All categories') }}
               </a>
               <div class="dropdown-menu px-2 pb-4"
                  style="min-width:65vw">
                  <a href="{{ route('categories.show', ['slug' => 'all']) }}">
                     <h6 class="fs-base ps-lg-2 mt-2">
                        {{ __('All products') }}
                     </h6>
                  </a>
                  <div class="row">
                     @foreach ($categoryGroups as $group)
                        <div class="col-md-4 pt-3 pt-sm-4 ps-2 px-lg-3">
                           <div class="widget widget-links">
                              <h6 class="fs-base mb-2 ps-2">
                                 {{ $group->name }}
                              </h6>
                              <ul class="widget-list ps-3">
                                 @foreach ($group->categories as $category)
                                    <li class="widget-list-item mb-1">
                                       <a class="widget-list-link d-flex align-items-start justify-content-between gap-3"
                                          href="{{ route('categories.show', ['slug' => $category->slug]) }}">
                                          <span>
                                             {{ $category->name }}
                                          </span>
                                          @if ($category->promotion_label)
                                             <span
                                                class="badge bg-success">{{ $category->promotion_label }}</span>
                                          @endif
                                       </a>
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </li>
         </ul>

         {{-- Visible categories- --}}
         <ul class="navbar-nav">
            @foreach ($categoryGroups as $group)
               @if ($group->visible_in_menu)
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">{{ $group->name }}
                     </a>
                     @if ($group->categories->count())
                        <ul class="dropdown-menu">
                           @foreach ($group->categories as $category)
                              <li class="dropdown">
                                 <a class="dropdown-item dropdown-toggle d-flex align-items-start justify-content-between gap-3"
                                    href="{{ route('categories.show', ['slug' => $category->slug]) }}">
                                    <span>
                                       {{ $category->name }}
                                    </span>
                                    @if ($category->promotion_label)
                                       <span
                                          class="badge bg-success">{{ $category->promotion_label }}</span>
                                    @endif
                                 </a>
                                 @if ($category->products->count())
                                    <ul class="dropdown-menu">
                                       @foreach ($category->products as $product)
                                          <li>
                                             <a class="dropdown-item d-flex align-items-start justify-content-between gap-3"
                                                href="{{ route('products.show', ['product' => $product->slug]) }}">
                                                {{ $product->title }}

                                                @if ($product->promotion_label)
                                                   <span class="badge bg-success">
                                                      {{ $product->promotion_label }}
                                                   </span>
                                                @endif
                                             </a>
                                          </li>
                                       @endforeach
                                    </ul>
                                 @endif
                              </li>
                           @endforeach
                        </ul>
                     @endif
                  </li>
               @endif
            @endforeach
            <li class="nav-item d-lg-none">
               <a href="{{ route('graphic-services') }}"
                  class="btn btn-link nav-link d-flex align-items-start justify-content-between gap-3">
                  {{ __('Graphic services') }}
               </a>
            </li>
            @auth
               <li class="nav-item d-lg-none">
                  <form action="{{ route('logout') }}"
                     method="POST">
                     @csrf
                     <button
                        class="btn btn-link nav-link d-flex align-items-start justify-content-between gap-3">
                        {{ __('Log out') }}
                     </button>
                  </form>
               </li>
            @endauth
         </ul>
      </div>
   </div>
</div>
