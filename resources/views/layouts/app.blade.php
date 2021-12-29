<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags-->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords"
        content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="handheld-toolbar-enabled">
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab"
                                data-bs-toggle="tab" role="tab" aria-selected="true"><i
                                    class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab"
                                role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate
                        id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Email address</label>
                            <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="si-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                    </form>
                    <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="page-wrapper">
        <!-- Quick View Modal-->
        <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Go to product page">Sports Hooded Sweatshirt<i
                                    class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Product gallery-->
                            <div class="col-lg-7 pe-lg-0">
                                <div class="product-gallery">
                                    <div class="product-gallery-preview order-sm-2">
                                        <div class="product-gallery-preview-item active" id="first"><img
                                                class="image-zoom" src="img/shop/single/gallery/01.jpg"
                                                data-zoom="img/shop/single/gallery/01.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="second"><img class="image-zoom"
                                                src="img/shop/single/gallery/02.jpg"
                                                data-zoom="img/shop/single/gallery/02.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="third"><img class="image-zoom"
                                                src="img/shop/single/gallery/03.jpg"
                                                data-zoom="img/shop/single/gallery/03.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom"
                                                src="img/shop/single/gallery/04.jpg"
                                                data-zoom="img/shop/single/gallery/04.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                    </div>
                                    <div class="product-gallery-thumblist order-sm-1"><a
                                            class="product-gallery-thumblist-item active" href="#first"><img
                                                src="img/shop/single/gallery/th01.jpg" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#second"><img
                                                src="img/shop/single/gallery/th02.jpg" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#third"><img
                                                src="img/shop/single/gallery/th03.jpg" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#fourth"><img
                                                src="img/shop/single/gallery/th04.jpg" alt="Product thumb"></a></div>
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                                <div class="product-details ms-auto pb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2"><a
                                            href="shop-single-v1.html#reviews">
                                            <div class="star-rating"><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star"></i>
                                            </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                                Reviews</span>
                                        </a>
                                        <button class="btn-wishlist" type="button" data-bs-toggle="tooltip"
                                            title="Add to wishlist"><i class="ci-heart"></i></button>
                                    </div>
                                    <div class="mb-3"><span
                                            class="h3 fw-normal text-accent me-1">$18.<small>99</small></span>
                                        <del class="text-muted fs-lg me-3">$25.<small>00</small></del><span
                                            class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                                    </div>
                                    <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span
                                            class="text-muted" id="colorOptionText">Red/Dark blue/White</span></div>
                                    <div class="position-relative me-n4 mb-3">
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color" id="color1"
                                                data-bs-label="colorOptionText" value="Red/Dark blue/White" checked>
                                            <label class="form-option-label rounded-circle" for="color1"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-image: url(img/shop/single/color-opt-1.png)"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color" id="color2"
                                                data-bs-label="colorOptionText" value="Beige/White/Black">
                                            <label class="form-option-label rounded-circle" for="color2"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-image: url(img/shop/single/color-opt-2.png)"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color" id="color3"
                                                data-bs-label="colorOptionText" value="Dark grey/White/Mustard">
                                            <label class="form-option-label rounded-circle" for="color3"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-image: url(img/shop/single/color-opt-3.png)"></span></label>
                                        </div>
                                        <div class="product-badge product-available mt-n1"><i
                                                class="ci-security-check"></i>Product available</div>
                                    </div>
                                    <form class="mb-grid-gutter">
                                        <div class="mb-3">
                                            <label class="fw-medium pb-1" for="product-size">Size:</label>
                                            <select class="form-select" required id="product-size">
                                                <option value="">Select size</option>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 d-flex align-items-center">
                                            <select class="form-select me-3" style="width: 5rem;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i
                                                    class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                                        </div>
                                    </form>
                                    <h5 class="h6 mb-3 pb-2 border-bottom"><i
                                            class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product
                                        info</h5>
                                    <h6 class="fs-sm mb-2">Style</h6>
                                    <ul class="fs-sm ps-4">
                                        <li>Hooded top</li>
                                    </ul>
                                    <h6 class="fs-sm mb-2">Composition</h6>
                                    <ul class="fs-sm ps-4">
                                        <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                        <li>Lining: Cotton 100%</li>
                                        <li>Cotton 80%, Polyester 20%</li>
                                    </ul>
                                    <h6 class="fs-sm mb-2">Art. No.</h6>
                                    <ul class="fs-sm ps-4 mb-0">
                                        <li>183260098</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <header class="shadow-sm">
            <!-- Topbar-->
            @include('partials.topbar')
            <!--Navbar-->
            @include('partials.navbar')
        </header>
        <div class="content">
            @yield('content')
        </div>

    </main>
    <!-- Footer-->
    @include('partials.footer')

    <!-- Toolbar for handheld devices (Default)-->
    @include('partials.toolbar')

    <!-- Back To Top Button-->
    <a class="btn-scroll-top" href="#top" data-scroll>
        <i class="btn-scroll-top-icon ci-arrow-up"></i>
    </a>
</body>

</html>
