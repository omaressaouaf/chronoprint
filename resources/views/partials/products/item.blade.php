<div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
    <div class="card product-card">
        <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html">
            <img src="{{$product->first_image}}" alt="{{ $product->name }}">
        </a>
        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">{{ $product->category?->name
                }}</a>
            <h3 class="product-title fs-sm"><a href="shop-single-v1.html">{{ $product->title }}</a></h3>
            <div class="d-flex justify-content-between">
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i
                        class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                </div>
            </div>
        </div>
        <div class="card-body card-body-hidden">
            <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>{{
                __('To order') }}</button>
        </div>
    </div>
    <hr class="d-sm-none">
</div>
