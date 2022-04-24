<section class="bg-secondary py-5">
   <div class="container-fluid px-xxl-10 py-md-4 pt-3 pb-0 py-sm-3">
      <h2 class="text-center mb-4 mb-md-5">{{ __('Satisfied clients') }}</h2>
      <div class="tns-carousel mb-3">
         <div class="tns-carousel-inner"
            data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;:20}, &quot;576&quot;:{&quot;items&quot;:2, &quot;gutter&quot;:20},&quot;850&quot;:{&quot;items&quot;:3, &quot;gutter&quot;:20},&quot;1080&quot;:{&quot;items&quot;:4, &quot;gutter&quot;:25}}}">
            @foreach ($testimonials as $testimonial)
               <blockquote class="mb-2">
                  <div class="card card-body fs-md text-muted border-0 shadow-sm">
                     <div class="mb-2">
                        <div class="star-rating">
                           @foreach (range(1, 5) as $rating)
                              <i
                                 class="star-rating-icon ci-star-filled @if ($testimonial['rating'] >= $rating) active @endif">
                              </i>
                           @endforeach
                        </div>
                     </div>
                     <div>
                        <h6 class="mt-2">{{ $testimonial['title'] }}</h6>
                        <span
                           class="fs-ms text-muted opacity-75">{{ $testimonial['date'] }}</span>
                     </div>
                  </div>
                  <footer class="d-flex justify-content-start align-items-center pt-4"><img
                        class="rounded"
                        src="/theme-images/testimonials/{{ $loop->index + 1 }}.jpeg"
                        width="50"
                        alt="{{ $testimonial['author']['name'] }}">
                     <div class="ps-3">
                        <h6 class="fs-sm mb-n1">{{ $testimonial['author']['name'] }}</h6><span
                           class="fs-ms text-muted">{{ $testimonial['author']['job'] }}</span>
                     </div>
                  </footer>
               </blockquote>
            @endforeach
         </div>
      </div>
   </div>
</section>
