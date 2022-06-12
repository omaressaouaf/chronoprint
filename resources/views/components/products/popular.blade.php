<section class="container pt-md-3 pb-5 mb-md-3 popular-products mt-4">
   <h2 class="h3 text-center mb-4">{{ __('Popular products') }}</h2>
   <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
         <ul id="product-categories">
            @foreach ($categories as $category)
               <li data-filter=".category-{{ $loop->index }}"
                  @class(['filter-active' => $loop->first])>
                  {{ $category->name }}
               </li>
            @endforeach
         </ul>
      </div>
   </div>
   <div class="row products-sliders-container" style="min-height: 400px">
      @foreach ($categories as $category)
         <div class="col-md-12 pt-4 mx-n2 category-{{ $loop->index }} products-slider">
            <div class="tns-carousel tns-controls-static tns-controls-outside pt-2">
               <div class="tns-carousel-inner pb-3"
                  data-carousel-options='{"items": 8, "gutter": 16, "controls": true,"nav" : false, "responsive": {"0":{"items":1}, "480":{"items":2}, "720":{"items":3}, "991":{"items":2}, "1140":{"items":3}, "1300":{"items":4}, "1500":{"items":5}}}'>
                  @foreach ($category->products as $product)
                     <x-products.item :product="$product" />
                  @endforeach
               </div>
            </div>
         </div>
      @endforeach
   </div>

   <div class="text-center">
      <a class="btn btn-outline-accent"
         href="{{ route('categories.show', ['slug' => 'all']) }}">
         {{ __('More products') }} <i class="ci-arrow-right ms-1"></i>
      </a>
   </div>
</section>
