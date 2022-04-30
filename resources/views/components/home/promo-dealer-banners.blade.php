<section class="container-fluid mt-4 mb-grid-gutter">
   <div class="row g-2">
      <div class="tns-carousel tns-controls-inside tns-controls-sm pt-2">
         <div class="tns-carousel-inner pb-3"
            data-carousel-options='{"items": 2, "gutter": 15, "controls": true,"nav" : false, "responsive": {"0":{"items":1}, "480":{"items":1}, "720":{"items":1}, "991":{"items":2}, "1140":{"items":2}, "1300":{"items":2}, "1500":{"items":2}}}'>
            <div class="col-md-6">
               <a href="{{ route('categories.show', ['slug' => 'all']) }}">
                  <img class="rounded-3 w-100"
                     src="/theme-images/banners/promo.png"
                     alt="{{ __('Coupon code') }}">
               </a>
            </div>
            <div class="col-md-6">
               <a href="{{ route('dealers-program.index') }}">
                  <img class="rounded-3 w-100"
                     src="/theme-images/banners/revendeur.png"
                     alt="{{ __('Dealers program') }}">
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
