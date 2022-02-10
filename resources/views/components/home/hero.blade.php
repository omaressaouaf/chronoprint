<section class="tns-carousel tns-controls-lg mb-3">
   <div class="tns-carousel-inner"
      data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
      @foreach (range(1, 4) as $slider)
         <div>
            <div class="d-lg-flex justify-content-between align-items-center">
               <img class="d-block order-lg-2 me-lg-n5 flex-shrink-0 w-100 h-auto"
                  style="vertical-align: middle;"
                  src="/storage/theme/home/hero-slider/{{ $slider }}.jpg"
                  alt="Slider">
            </div>
         </div>
      @endforeach
   </div>
</section>
