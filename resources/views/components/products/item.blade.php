@props(['product'])

<div class="col-lg-3 col-md-4 col-sm-6 col-12 px-2 mb-4">
   <div class="card product-card">
      @if ($product->promotion_label)
         <span class="badge bg-success">{{ $product->promotion_label }}</span>
      @endif
      <a class="card-img-top d-block overflow-hidden"
         href="{{ route('products.show', ['product' => $product->slug]) }}">
         <img src="{{ $product->first_image }}"
            class=""
            alt="{{ $product->name }}">
      </a>
      <div class="card-body py-2">
         @if ($product->category)
            <a class="product-meta d-block fs-xs pb-1"
               href="{{ route('categories.show', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
         @endif
         <h3 class="product-title fs-sm"><a
               href="{{ route('products.show', ['product' => $product->slug]) }}">{{ $product->title }}</a>
         </h3>
         <div class="d-flex justify-content-between">
            <div class="star-rating">
               @foreach (range(1, 5) as $rating)
                  <i class="star-rating-icon ci-star-filled @if ($product->average_rating >= $rating) active @endif">
                  </i>
               @endforeach
            </div>
         </div>

      </div>
      <div class="card-body card-body-hidden">
         <a href="{{ route('products.show', ['product' => $product->slug]) }}"
            class="btn btn-primary btn-sm d-block w-100 mb-2"><i
               class="ci-cart fs-sm me-1"></i>{{ __('To order') }}</a>
      </div>
   </div>
   <hr class="d-sm-none">
</div>
