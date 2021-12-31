<section class="container pt-md-3 pb-5 mb-md-3">
    <h2 class="h3 text-center">{{__("Popular products")}}</h2>
    <div class="row pt-4 mx-n2">
        <!-- Product-->
        @foreach ($products as $product)
        @include('partials.shop.product-item' , ["product" => $product])
        @endforeach
    </div>
    <div class="text-center pt-3">
        <a class="btn btn-outline-accent" href="{{ route('categories.show', ['slug' => 'all']) }}">
            {{__("More products")}} <i class="ci-arrow-right ms-1"></i>
        </a>
    </div>
</section>
