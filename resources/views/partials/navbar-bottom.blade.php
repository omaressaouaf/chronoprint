<div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
    <div class="container">
        <div class="collapse navbar-collapse"
             id="navbarCollapse">
            <div class="d-flex d-lg-none">
                @include('partials.global-search')
            </div>

            <!-- Departments menu-->
            <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0"
                       href="#"
                       data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>{{ __('Shop by category') }}</a>
                    <div class="dropdown-menu px-2 pb-4"
                         style="min-width: 58vw  ; max-width: 58vw;">
                        <div class="d-flex flex-wrap">
                            @foreach ($categoryGroups as $group)
                                <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                                    <div class="widget widget-links">
                                        <h6 class="fs-base mb-2">{{ $group->name }}</h6>
                                        <ul class="widget-list">
                                            @foreach ($group->categories as $category)
                                                <li class="widget-list-item mb-1">
                                                    <a class="widget-list-link"
                                                       href="#">
                                                        {{ $category->name }}
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
            <!-- Primary menu-->
            <ul class="navbar-nav">
                @foreach ($categoryGroups as $group)
                    @if ($loop->index < 6)
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                               href="#"
                               data-bs-toggle="dropdown">{{ $group->name }}</a>
                            <div class="dropdown-menu p-0">
                                <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                                    @foreach ($group->categories as $category)
                                        <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                                            <div class="widget widget-links mb-4">
                                                <a href="#">
                                                    <h6 class="fs-base mb-3">{{ $category->name }}
                                                    </h6>
                                                </a>
                                                <ul class="widget-list">
                                                    @foreach ($category->products as $product)
                                                        <li class="widget-list-item">
                                                            <a class="widget-list-link"
                                                               href="shop-grid-ls.html">
                                                                {{ $product->title }}
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
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
