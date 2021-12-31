@extends('layouts.app')

@section('content')
    @include('partials.hero-slider')
    <!-- Popular categories-->
    <section class="container position-relative pt-3 pt-lg-0 pb-5 mt-lg-n10"
             style="z-index: 10;">
        <div class="row">
            <div class="col-xl-8 col-lg-9">
                <div class="card border-0 shadow-lg">
                    <div class="card-body px-3 pt-grid-gutter pb-0">
                        <div class="row g-0 ps-1">
                            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1"
                                   href="shop-grid-ls.html"><img class="d-block rounded mb-3"
                                         src="/storage/theme/home/categories/cat-sm01.jpg"
                                         alt="Men">
                                </a></div>
                            <div class="col-sm-4 px-2 mb-grid-gutter"><a
                                   class="d-block text-center text-decoration-none me-1"
                                   href="shop-grid-ls.html"><img class="d-block rounded mb-3"
                                         src="/storage/theme/home/categories/cat-sm02.jpg"
                                         alt="Women">
                                </a></div>
                            <div class="col-sm-4 px-2 mb-grid-gutter"><a
                                   class="d-block text-center text-decoration-none me-1"
                                   href="shop-grid-ls.html"><img class="d-block rounded mb-3"
                                         src="/storage/theme/home/categories/cat-sm03.jpg"
                                         alt="Kids">
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.shop.popular')

    @include('partials.brands')

    @include('partials.contact-cards')


@endsection
