<section class="tns-carousel tns-controls-lg tns-nav-inside mb-3">
   <div class="tns-carousel-inner"
      data-carousel-options='{"mode": "gallery","autoplay": "true","autoplayTimeout": "7400", "responsive": {"0":{"nav":true, "controls": false},"992":{"nav":true, "controls": true}}}'>
      @foreach ($sliders as $slider)
         <div class="pe-lg-5 slider-item"
            style="background-image:linear-gradient(to right, #ccb5037a,#dac1011f, transparent), url('/storage/theme/home/hero-slider/{{ $loop->index + 1 }}.png');">
            <div class="d-lg-flex justify-content-between align-items-center h-100">
               <div class="slider-item-content position-relative px-5 mb-lg-5 py-5 py-lg-0"
                  style="z-index: 10;">
                  <div class="pb-lg-5 text-center text-lg-start">
                     <h1 class="fw-bold text-light from-start delay-1 text-xl-nowrap fs-2 mb-3">
                        {{ $slider['title'] }}
                     </h1>
                     <p class="fs-6 text-light pb-3 from-start delay-2">
                        {{ $slider['description'] }}
                     </p>
                     <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-accent"
                           href="{{ route('categories.show', ['slug' => 'all']) }}">
                           {{ __('Check out our products') }}
                           <i class="ci-arrow-right ms-2 me-n1"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <img class="d-block d-lg-none slider-item-image"
                  src="/storage/theme/home/hero-slider/{{ $loop->index + 1 }}-mobile.png"
                  alt="{{ $slider['title'] }}">
            </div>
         </div>
      @endforeach
   </div>
</section>
