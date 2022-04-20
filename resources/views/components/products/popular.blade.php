<section class="container pt-md-3 pb-5 mb-md-3">
   <h2 class="h3 text-center">{{ __('Popular products') }}</h2>
   <div class="row pt-4 mx-n2">
      <div class="tns-carousel tns-controls-static tns-controls-outside pt-2">
         <div class="tns-carousel-inner pb-3"
            data-carousel-options='{"items": 8, "gutter": 16, "controls": true,"nav" : false, "responsive": {"0":{"items":1}, "480":{"items":2}, "720":{"items":3}, "991":{"items":2}, "1140":{"items":3}, "1300":{"items":4}, "1500":{"items":5}}}'>
            @foreach ($products as $product)
               <x-products.item :product="$product" />
            @endforeach
         </div>
      </div>
   </div>
   <div class="text-center pt-3">
      <a class="btn btn-outline-accent"
         href="{{ route('categories.show', ['slug' => 'all']) }}">
         {{ __('More products') }} <i class="ci-arrow-right ms-1"></i>
      </a>
   </div>
</section>
