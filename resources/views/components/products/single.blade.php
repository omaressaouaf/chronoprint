@props(['product'])

<div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
   <div class="px-lg-3">
      <div class="row">
         {{-- Product Gallery --}}
         <div class="col-lg-6 pe-lg-0 pt-lg-4">
            <div class="product-gallery">
               <div class="product-gallery-preview order-sm-2">
                  @foreach ($product->all_images as $image)
                     <div class="product-gallery-preview-item @if ($loop->first) active @endif"
                        id="image-{{ $loop->index }}">
                        <img class="image-zoom rounded-3"
                           src="{{ $image }}"
                           data-zoom="{{ $image }}"
                           alt="{{ $product->title }}">
                        <div class="image-zoom-pane"></div>
                     </div>
                  @endforeach
               </div>
               <div class="product-gallery-thumblist order-sm-1">
                  @foreach ($product->all_images as $image)
                     <a class="product-gallery-thumblist-item @if ($loop->first) active @endif"
                        href="#image-{{ $loop->index }}">
                        <img src="{{ $image }}"
                           alt="{{ $product->title }}">
                     </a>
                  @endforeach

               </div>
            </div>
            <div class="ps-md-5 mt-4">
               <div class="ps-md-4">
                  <h3 class="accordion-header ps-md-2"><a class="accordion-button"
                        href="#product-details"
                        role="button"
                        data-bs-toggle="collapse"
                        aria-expanded="true"
                        aria-controls="product-details">
                        {{ __('Product details') }}
                     </a></h3>
                  <div class="accordion-collapse collapse show ps-md-2"
                     id="product-details"
                     data-bs-parent="#productPanels">
                     <div class="accordion-body">
                        {!! $product->details !!}
                     </div>
                  </div>
               </div>
            </div>
         </div>

         {{-- Product info --}}
         <div class="col-lg-6 pt-4 pt-lg-0">
            <div class="pb-3">
               <div class="d-flex justify-content-between align-items-center mb-2 px-3 px-lg-5"><a
                     href="#reviews"
                     data-scroll>
                     <div class="star-rating">
                        @foreach (range(1, 5) as $rating)
                           <i class="star-rating-icon ci-star-filled @if ($product->average_rating >= $rating) active @endif">
                           </i>
                        @endforeach
                     </div>
                     <span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">
                        {{ count($product->reviews) }} {{ __('Reviews') }}
                     </span>
                  </a>
               </div>
               @if ($product->promotion_label)
                  <div class="position-relative me-n4 mb-5">
                     <div class="product-badge product-available mt-n1">
                        {{ $product->promotion_label }}</div>
                  </div>
               @endif
               <div class="px-lg-4">
                  {{-- Product Attributes & Quantity calculator --}}
                  <livewire:products.price-calculator :product="$product" />
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

{{-- Product description and reviews --}}

<section class="container mb-4 mb-lg-5">
   <ul class="nav nav-tabs"
      role="tablist">
      <li class="nav-item"><a class="nav-link p-4 active"
            href="#reviews"
            data-bs-toggle="tab"
            role="tab">{{ __('Product reviews') }}</a></li>
      @if ($product->description)
         <li class="nav-item"><a class="nav-link p-4"
               href="#details"
               data-bs-toggle="tab"
               role="tab">{{ __('Product description') }}</a></li>
      @endif
   </ul>
   <div class="tab-content pt-2">
      <div class="tab-pane fade show active"
         id="reviews"
         role="tabpanel">
         <div class="row">
            <div class="col-lg-12">
               <livewire:products.reviews.index :product="$product" />
            </div>
         </div>
      </div>
      @if ($product->description)
         <div class="tab-pane fade show"
            id="details"
            role="tabpanel">
            <div class="row">
               <div class="col-lg-12">
                  {!! $product->description !!}
               </div>
            </div>
         </div>
      @endif
   </div>
</section>
