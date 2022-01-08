<div class="border-top my-lg-3 py-5">
   <div class="container pt-md-2"
      id="reviews">
      <div class="row pb-3">
         <div class="col-lg-4 col-md-5">
            <h2 class="h3 mb-4">{{ $reviewsCount }} {{ __('Reviews') }}</h2>
            <div class="star-rating me-2">
               @foreach (range(1, 5) as $rating)
                  <i class="star-rating-icon
                  @if ($product->average_rating >= $rating) ci-star-filled text-accent @else ci-star text-muted @endif">
                  </i>
               @endforeach
            </div>
            <span class="d-inline-block align-middle">
               {{ __('Overall rating') }}
            </span>
         </div>
         <div class="col-lg-8 col-md-7">
            @foreach (range(5, 1) as $rating)
               <div class="d-flex align-items-center mb-2">
                  <div class="text-nowrap me-3">
                     <span
                        class="d-inline-block align-middle text-muted">{{ $rating }}</span><i
                        class="ci-star-filled fs-xs ms-1"></i>
                  </div>
                  <div class="w-100">
                     <div class="progress"
                        style="height: 4px">
                        <div class="progress-bar bg-{{ $bgColorPerRating[$rating] }}"
                           role="progressbar"
                           style="width: {{ $this->calculateRatingPercent($reviewsCountPerRating, $rating) }}%"
                           aria-valuenow="{{ $this->calculateRatingPercent($reviewsCountPerRating, $rating) }}"
                           aria-valuemin="0"
                           aria-valuemax="100"></div>
                     </div>
                  </div>
                  <span
                     class="text-muted ms-3">{{ $reviewsCountPerRating[$rating]['count'] ?? 0 }}
                  </span>
               </div>
            @endforeach
         </div>
      </div>
      <hr class="mt-4 mb-3" />
      <div class="row pt-4">
         <div class="col-md-7">
            <div wire:target="deleteReview"
               wire:loading
               class="spinner-border text-accent float-end">
            </div>
            @forelse ($reviews as $review)
               <div class="product-review pb-4 mb-4 border-bottom">
                  <div class="d-flex mb-3">
                     <div class="d-flex align-items-center me-4 pe-2">
                        <img class="rounded-circle"
                           src="/storage/{{ $review->user->avatar }}"
                           width="50"
                           alt="Rafael Marquez" />
                        <div class="ps-3">
                           <h6 class="fs-sm mb-0">{{ $review->user->name }}</h6>
                           <span
                              class="fs-ms text-muted">{{ $review->created_at->toDateString() }}</span>
                        </div>
                     </div>
                     <div>
                        <div class="star-rating">
                           @foreach (range(1, 5) as $rating)
                              <i class="star-rating-icon ci-star-filled @if ($review->rating >= $rating) active @endif">
                              </i>
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <p class="fs-md mb-2">
                     {{ $review->body }}
                  </p>
                  @can('delete_review', $review)
                     <div class="text-nowrap">
                        <button wire:click="deleteReview({{ $review->id }})"
                           class="btn btn-link ps-0 ms-0"
                           type="button">
                           <i class="ci-trash"></i>
                        </button>
                     </div>
                  @endcan
               </div>
            @empty
               <h4>{{ __('No reviews for this product') }}</h4>
            @endforelse
            {{ $reviews->links() }}
         </div>
         <livewire:products.reviews.form :product="$product" />
      </div>
   </div>
</div>
