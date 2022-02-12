<section class="tns-carousel tns-controls-lg mb-3">
   <div class="tns-carousel-inner"
      data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
      @foreach ($sliders as $slider)
         <div class="pe-lg-5 slider-item">
            <div class="d-lg-flex justify-content-between align-items-center">
               <div class="position-relative mx-auto py-5 mb-lg-5 order-lg-2"
                  style="z-index: 10;">
                  <div class="pb-lg-5 text-center text-lg-start">
                     <h2 class="text-light fw-bold from-start delay-1 text-xl-nowrap mb-3"
                        style="font-size: 2.2rem">
                        {{ $slider['title'] }}
                     </h2>
                     <p class="fs-6 text-light pb-3 from-start delay-2">
                        {{ $slider['paragraph'] }}
                     </p>
                     <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-accent"
                           href="{{ route('categories.show', ['slug' => 'all']) }}">
                           {{ __('Check out our products') }}
                           <i class="ci-arrow-right ms-2 me-n1"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <img class="d-block me-lg-n5 order-lg-1 slider-item-image"
                  src="/storage/theme/home/hero-slider/{{ $slider["image"] }}"
                  alt="Slider">
            </div>
         </div>
      @endforeach
   </div>
</section>
